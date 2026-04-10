@echo off
REM File: start_app.bat
REM This launcher starts the Marshfield app server (if needed) and opens the app in a browser.
setlocal

cd /d "%~dp0"

set "APP_URL=http://127.0.0.1:5000/page1"
set "SERVER_RUNNING="

REM Use project virtual environment first. If not present, fall back to system python.
if exist ".venv\Scripts\python.exe" (
  set "PYTHON_CMD=%~dp0.venv\Scripts\python.exe"
) else (
  set "PYTHON_CMD=python"
)

REM Check if something is already listening on port 5000.
for /f "tokens=1-5" %%A in ('netstat -ano ^| findstr :5000 ^| findstr LISTENING') do (
  set "SERVER_RUNNING=1"
)

if not defined SERVER_RUNNING (
  REM Show a clear message if Python is missing.
  "%PYTHON_CMD%" --version >nul 2>&1
  if errorlevel 1 (
    echo Python was not found. Please complete setup from instruction_manual.html first.
    pause
    exit /b 1
  )

  REM Start Flask in a separate minimized window.
  start "Marshfield App Server" /min cmd /c "cd /d ""%~dp0"" && ""%PYTHON_CMD%"" -m flask --app app run"
  timeout /t 2 /nobreak >nul
)

REM Open in Chrome if installed, otherwise use default browser.
if exist "%ProgramFiles%\Google\Chrome\Application\chrome.exe" (
  start "" "%ProgramFiles%\Google\Chrome\Application\chrome.exe" "%APP_URL%"
) else if exist "%ProgramFiles(x86)%\Google\Chrome\Application\chrome.exe" (
  start "" "%ProgramFiles(x86)%\Google\Chrome\Application\chrome.exe" "%APP_URL%"
) else (
  start "" "%APP_URL%"
)

exit /b 0
