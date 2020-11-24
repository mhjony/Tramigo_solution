SELECT device.name AS name, 
    report.device_id AS Device_id, 
    report.location AS Location, 
    report.date_created AS report_date 
FROM report 
JOIN device ON device.id = report.device_id