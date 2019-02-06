@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../vendor/dsv/codeigniter-installer/codeigniter
php "%BIN_TARGET%" %*
