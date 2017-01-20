@echo off
if not exist D:\OldDir.txt echo. > D:\OldDir.txt
dir /b "C:\Users\VIKAS\AppData\Local\Google\Cloud SDK\data" > D:\NewDir.txt
set equal=no
fc D:\OldDir.txt D:\NewDir.txt | find /i "no differences" > nul && set equal=yes
copy /y D:\Newdir.txt D:\OldDir.txt > nul
if %equal%==yes (echo "Not changed") else (start cmd /k gsutil rsync -r "C:\Users\VIKAS\AppData\Local\Google\Cloud SDK\data" gs://healthcareiot
)
