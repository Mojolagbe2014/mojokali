$(document).ready(function(){
    $("form#login-form").submit(function(e){ 
        e.stopPropagation();
        e.preventDefault();
        var formDatas = $(this).serialize();
        
        $.ajax({
            url: $(this).attr("action"),
            type: 'POST',
            data: formDatas,
            cache: false,
            success : function(data, status) {
                if(data.status == "1"){
                    $.each(data.info, function(i, item) {
                        if (typeof localStorage !== "undefined") {
                            sessionStorage.VPELoggedInAdmin = true;
                            sessionStorage.VPEAdminName = item.userName;
                            sessionStorage.VPEAdminFullName = item.name;
                            sessionStorage.VPEAdminRole = item.role;
                            sessionStorage.VPEadminId = item.id;
                            sessionStorage.VPEadminEmail = item.email;
                        }
                    });
                    $("#messageBox, messageBox").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><img src="images/cycling.GIF" width="30" height="30" alt="Ajax Loading"> Login Successful! Welcome '+sessionStorage.VPEAdminName+', redirecting... please wait ...</div>');
                    setInterval(function(){ window.location = 'index'; }, 2000);
                }
                else {
                    $("#messageBox, messageBox").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>'+data.msg+'</div>');
                }
            }
        });
        return false;
    });
});