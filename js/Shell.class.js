/* 
 * Shell class contains calls to backend to interact with Shell
 *
 * @author Alberto Miranda <alberto.php@gmail.com>
 */
var ajaxGateway = 'openShell.php';

var Shell = {
    "waiting": false,

    "execute": function(){
        //TODO: validate command

        //avoid calling again the server if still waiting response
        if(this.waiting) return false;

        //show loading
        $('#shellInputContainer').append('<img id="loading" src="img/loading.gif" />');

        //get and clear command from Shell Input
        var command = $('#shellInput').val();
        if(command=='') return false;
        $('#shellInput').val('');

        this.waiting = true;
        $.ajax({
            type: "POST",
            url: ajaxGateway,
            data: {
                'command': command
            },
            success: function(result){
                //send to shell UI
                $('#shell').append(result);
                $("#shell").scrollTop($("#shell")[0].scrollHeight);
                Shell.waiting = false;
                $('#shellInput').focus();
            },
            complete: function(){
                //hide loading
                $('#loading').remove();
            }
        });
    },

    /**
     * Handle key press inside Shell Input.
     * If enter was pressed send command.
     *
     * @author Alberto Miranda <alberto.php@gmail.com>
     */
    "handleKeys": function(){
        $(document).keypress(function(e) {
            if(e.which == 13) Shell.execute();
        });
    }
};