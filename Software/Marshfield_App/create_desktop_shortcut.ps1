# File: create_desktop_shortcut.ps1
# This script creates a desktop shortcut so users can launch the app with one click.

$ErrorActionPreference = "Stop"

$projectRoot = Split-Path -Parent $MyInvocation.MyCommand.Path
$starterFile = Join-Path $projectRoot "start_app.bat"
$desktopPath = [Environment]::GetFolderPath("Desktop")
$shortcutPath = Join-Path $desktopPath "Marshfield School History.lnk"

if (-not (Test-Path $starterFile)) {
    throw "start_app.bat was not found in: $projectRoot"
}

$wsh = New-Object -ComObject WScript.Shell
$shortcut = $wsh.CreateShortcut($shortcutPath)
$shortcut.TargetPath = $starterFile
$shortcut.WorkingDirectory = $projectRoot
$shortcut.Description = "Open Marshfield School History application"
$shortcut.IconLocation = "$env:SystemRoot\System32\SHELL32.dll,220"
$shortcut.Save()

Write-Host "Desktop shortcut created:" -ForegroundColor Green
Write-Host $shortcutPath
