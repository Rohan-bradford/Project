// File: media-viewer.js
// This script opens local image/PDF source links in a shared dialog with next and previous buttons.
(function () {
  const viewer = document.getElementById("mediaViewer");
  if (!viewer) {
    return;
  }

  const titleEl = document.getElementById("mediaViewerTitle");
  const imageEl = document.getElementById("mediaViewerImage");
  const frameEl = document.getElementById("mediaViewerFrame");
  const closeBtn = document.getElementById("mediaViewerClose");
  const prevBtn = document.getElementById("mediaViewerPrev");
  const nextBtn = document.getElementById("mediaViewerNext");

  const imageExtensions = [".jpg", ".jpeg", ".png", ".gif", ".webp", ".bmp", ".svg"];
  const frameExtensions = [".pdf", ".doc", ".docx"];

  let mediaLinks = [];
  let currentIndex = -1;

  function extensionFromHref(href) {
    try {
      const url = new URL(href, window.location.origin);
      const path = url.pathname.toLowerCase();
      const dotIndex = path.lastIndexOf(".");
      if (dotIndex === -1) {
        return "";
      }
      return path.slice(dotIndex);
    } catch (error) {
      return "";
    }
  }

  function isMediaLink(anchor) {
    if (!anchor || anchor.dataset.noViewer !== undefined) {
      return false;
    }

    const rawHref = anchor.getAttribute("href") || "";
    if (!rawHref || rawHref.startsWith("#") || rawHref.startsWith("javascript:")) {
      return false;
    }

    let url;
    try {
      url = new URL(rawHref, window.location.href);
    } catch (error) {
      return false;
    }

    // Keep normal behavior for external links.
    if (url.origin !== window.location.origin) {
      return false;
    }

    // We only intercept source files that live in the Images folder.
    if (!url.pathname.toLowerCase().includes("/images/")) {
      return false;
    }

    const ext = extensionFromHref(url.href);
    return imageExtensions.includes(ext) || frameExtensions.includes(ext);
  }

  function collectMediaLinks() {
    return Array.from(document.querySelectorAll("a[href]")).filter(isMediaLink);
  }

  function filenameFromHref(href) {
    try {
      const url = new URL(href, window.location.href);
      const segments = url.pathname.split("/");
      const file = segments[segments.length - 1] || "Source file";
      return decodeURIComponent(file);
    } catch (error) {
      return "Source file";
    }
  }

  function updateNavButtons() {
    prevBtn.disabled = currentIndex <= 0;
    nextBtn.disabled = currentIndex >= mediaLinks.length - 1;
  }

  function renderCurrentItem() {
    if (currentIndex < 0 || currentIndex >= mediaLinks.length) {
      return;
    }

    const anchor = mediaLinks[currentIndex];
    const href = new URL(anchor.getAttribute("href"), window.location.href).href;
    const ext = extensionFromHref(href);
    const titleText = anchor.textContent.trim() || filenameFromHref(href);

    titleEl.textContent = titleText;

    if (frameExtensions.includes(ext)) {
      imageEl.hidden = true;
      imageEl.removeAttribute("src");
      frameEl.hidden = false;
      frameEl.src = href;
    } else {
      frameEl.hidden = true;
      frameEl.src = "about:blank";
      imageEl.hidden = false;
      imageEl.src = href;
    }

    updateNavButtons();
  }

  function openViewer(index) {
    mediaLinks = collectMediaLinks();
    if (!mediaLinks.length) {
      return;
    }

    if (index < 0 || index >= mediaLinks.length) {
      return;
    }

    currentIndex = index;
    viewer.classList.add("show");
    viewer.setAttribute("aria-hidden", "false");
    document.body.classList.add("media-viewer-open");
    renderCurrentItem();
  }

  function closeViewer() {
    viewer.classList.remove("show");
    viewer.setAttribute("aria-hidden", "true");
    document.body.classList.remove("media-viewer-open");
    frameEl.src = "about:blank";
    imageEl.removeAttribute("src");
  }

  function move(step) {
    const nextIndex = currentIndex + step;
    if (nextIndex < 0 || nextIndex >= mediaLinks.length) {
      return;
    }
    currentIndex = nextIndex;
    renderCurrentItem();
  }

  document.addEventListener("click", function (event) {
    const anchor = event.target.closest("a[href]");
    if (!anchor || !isMediaLink(anchor)) {
      return;
    }

    // Keep browser behavior for modified clicks.
    if (
      event.defaultPrevented ||
      event.button !== 0 ||
      event.metaKey ||
      event.ctrlKey ||
      event.shiftKey ||
      event.altKey
    ) {
      return;
    }

    event.preventDefault();
    const allLinks = collectMediaLinks();
    const index = allLinks.indexOf(anchor);
    if (index !== -1) {
      openViewer(index);
    }
  });

  closeBtn.addEventListener("click", closeViewer);
  prevBtn.addEventListener("click", function () { move(-1); });
  nextBtn.addEventListener("click", function () { move(1); });

  viewer.addEventListener("click", function (event) {
    const target = event.target;
    if (target && target.dataset && target.dataset.close === "true") {
      closeViewer();
    }
  });

  document.addEventListener("keydown", function (event) {
    if (!viewer.classList.contains("show")) {
      return;
    }

    if (event.key === "Escape") {
      closeViewer();
      return;
    }

    if (event.key === "ArrowLeft") {
      move(-1);
      return;
    }

    if (event.key === "ArrowRight") {
      move(1);
    }
  });
})();
