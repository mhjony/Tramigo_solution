$(document).ready(function (){
    $.getJSON("data.json", function(data){
        var device_data = '';
        var i;
        $.each(data, function(key, value){
                device_data += '<tr>';
                device_data += '<td>'+value.ID+'</td>';
                device_data += '<td>'+value.IMEI+'</td>';
                device_data += '<td>'+value.Name+'</td>';
                var j = value.reports.length;
                var k = value.reports.length;
                i = 0;
                while (j > 0)
                {
                    while (i < k)
                    {
                        //If same device has multiple reports then it will display ID, IMEI, Name again in every <tr>
                        if (k > 1 && i > 0)
                        {
                            device_data += '<td>'+value.ID+'</td>';
                            device_data += '<td>'+value.IMEI+'</td>';
                            device_data += '<td>'+value.Name+'</td>';
                        }
                        device_data += '<td>'+value.reports[i]["Device_ID"]+'</td>';
                        device_data += '<td>'+value.reports[i]["ID"]+'</td>';
                        device_data += '<td>'+value.reports[i]["Latitude"]+'</td>';
                        device_data += '<td>'+value.reports[i]["Location"]+'</td>';
                        device_data += '<td>'+value.reports[i]["Longitude"]+'</td>';
                        device_data += '</tr>';
                        i++;
                    }
                    j--;
                }
        })
        $('#device_table').append(device_data);
    })
})