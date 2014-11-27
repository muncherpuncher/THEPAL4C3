

/* Delete Event */

function deleteEvent( event_id )
{

    $.ajax({
        url: base_url + 'events/delete_event',
        type: "POST",
        data: { 
            
            event_id : event_id
        },
        dataType: 'json',
        async:false,
        success: function(data, textStatus, jqXHR)
        {
           console.log(data);
        }, 
        error: function (jqXHR, textStatus, errorThrown)
        {
            
        }

    });

}