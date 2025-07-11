# Monitor Server
Monitor Server merupakan project laravel yang berfungsi untuk melihat stats server
- `disk usage`
- `cpu usage`
- `hostname`
- `memory usage`
- `uptime`

## Usage

create bash script, for example `monitor.sh`

```bash
#!/bin/bash

HOSTNAME=$(hostname)
CPU=$(top -bn1 | grep "Cpu(s)" | awk '{print 100 - $8}')
MEM=$(free | grep Mem | awk '{print $3/$2 * 100.0}')
DISK=$(df / | grep / | awk '{print $5}' | sed 's/%//')
UPTIME=$(uptime -p)

read -r -d '' PAYLOAD <<EOF
{
  "hostname": "$HOSTNAME",
  "cpu_usage": $CPU,
  "memory_usage": $MEM,
  "disk_usage": $DISK,
  "uptime": "$UPTIME"
}
EOF

curl -X POST http://localhost:8000/api/report -H "Content-Type: application/json" -d "$PAYLOAD"
```

## License

[MIT](https://choosealicense.com/licenses/mit/)