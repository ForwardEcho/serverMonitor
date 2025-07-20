<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Laporan Status Server</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">

  <table width="100%" cellpadding="0" cellspacing="0" border="0" style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 8px; overflow: hidden;">
    <tr>
      <td style="background-color: #4f46e5; color: white; padding: 20px 30px;">
        <h2 style="margin: 0;">Server Status Reporting</h2>
      </td>
    </tr>
    <tr>
      <td style="padding: 30px;">
        <table width="100%" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <td style="padding: 10px 0; font-weight: bold;">Hostname</td>
            <td style="padding: 10px 0;">{{ $stat->hostname }}</td>
          </tr>
          <tr>
            <td style="padding: 10px 0; font-weight: bold;">CPU Usage</td>
            <td style="padding: 10px 0;">{{ $stat->cpu_usage }}%</td>
          </tr>
          <tr>
            <td style="padding: 10px 0; font-weight: bold;">Memory Usage</td>
            <td style="padding: 10px 0;">{{ $stat->memory_usage }}%</td>
          </tr>
          <tr>
            <td style="padding: 10px 0; font-weight: bold;">Disk Usage</td>
            <td style="padding: 10px 0;">{{ $stat->disk_usage }}%</td>
          </tr>
          <tr>
            <td style="padding: 10px 0; font-weight: bold;">Uptime</td>
            <td style="padding: 10px 0;">{{ $stat->uptime }}</td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td style="background-color: #f1f1f1; padding: 20px; text-align: center; font-size: 12px; color: #555;">
        &copy; {{ date('Y') }} <b>SrvStat</b>. All rights reserved.
      </td>
    </tr>
  </table>

</body>
</html>
