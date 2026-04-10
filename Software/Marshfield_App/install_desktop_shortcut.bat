@echo off
REM File: install_desktop_shortcut.bat
REM This runs one-time setup to create the desktop launcher icon.
setlocal

cd /d "%~dp0"

powershell -NoProfile -ExecutionPolicy Bypass -File "%~dp0create_desktop_shortcut.ps1"
if errorlevel 1 (
  echo.
  echo Shortcut setup failed.
  echo Try right-clicking Command Prompt or PowerShell and choose "Run as administrator",
  echo then run this file again.
  pause
  exit /b 1
)

echo.
echo Shortcut setup complete. Use the "Marshfield School History" icon on your desktop.
pause
exit /b 0
