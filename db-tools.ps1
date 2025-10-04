$Container = "db"
$DbUser = "angio"
$DbPass = "kotor"
$DbName = "angio"
$Date = Get-Date -Format "yyyy-MM-dd"
$BackupFile = "backups\backup-$Date.sql"

param(
    [Parameter(Mandatory=$true)]
    [ValidateSet("dump","restore")]
    [string]$Action
)

if ($Action -eq "dump") {
    Write-Output "Pravim dump baze..."
    docker exec $Container mysqldump -u$DbUser -p$DbPass $DbName | Out-File -Encoding utf8 $BackupFile
}
elseif ($Action -eq "restore") {
    Write-Output "Vraćam bazu iz dump-a..."
    Get-Content $BackupFile | docker exec -i $Container mysql -u$DbUser -p$DbPass $DbName
}

