$(document).ready(function(){
	//Merchant Active 
	$(".merchantActive").on('click',function(){
		var merchantId=$(this).attr('merchantId');
		swal({
        title: "Are you sure?",
        text: "You want to active merchant",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, active it!",
        closeOnConfirm: false
    }, function () {
        //swal("Deleted!", "Your imaginary file has been deleted.", "success");
        $.ajax({
        	type:"POST",
        	url:"active_merchant.php",
        	data:"m="+merchantId,
        	dataType:"text",
        	success:function(res)
        	{
        		if(res==1)
        		{
        			$("#loaddata").load('marchantReload.php');
        			swal("Success!", "Successfully Activated", "success");

        		}
        		else
        		{
        			swal("Warning!", "Something wrong", "warning");
        		}
        	}
        });
        
    });

	});

	//Merchant Inactive 
	$(".merchantInactive").on('click',function(){
		var merchantId=$(this).attr('merchantId');
		swal({
        title: "Are you sure?",
        text: "You want to inactive merchant",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, inactive it!",
        closeOnConfirm: false
    }, function () {
        //swal("Deleted!", "Your imaginary file has been deleted.", "success");
        $.ajax({
        	type:"POST",
        	url:"inactive_merchant.php",
        	data:"m="+merchantId,
        	dataType:"text",
        	success:function(res)
        	{
        		if(res==1)
        		{
        			$("#loaddata").load('marchantReload.php');
        			swal("Success!", "Successfully Inactivated", "success");

        		}
        		else
        		{
        			swal("Warning!", "Something wrong", "warning");
        		}
        	}
        });
        
    });

	});

    //open modal

    $(".boxDet").on('click',function(){
        
        var privateKey=$(this).attr('id');
        $("#modelVal").html("");
        $.ajax({
            type:"POST",
            url:"box_details.php",
            data:"p="+privateKey,
            dataType:"text",
            success:function(res)
            {
                $('#myModal').show();
                $("#modelVal").html(res);
            }
        });
        return false;
    });

   
    


    //Box Active 
    $(".boxActive").on('click',function(){
        var BoxId=$(this).attr('BoxId');
        var email=$(this).attr('uemail');

        swal({
        title: "Are you sure?",
        text: "You want to active merchant",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, active it!",
        closeOnConfirm: false
    }, function () {
        //swal("Deleted!", "Your imaginary file has been deleted.", "success");
        $.ajax({
            type:"POST",
            url:"box_Active.php",
            data:"m="+BoxId,
            dataType:"text",
            success:function(res)
            {
                if(res==1)
                {
                    console.log('boxReload.php?id='+btoa(email));
                    $("#loadbox").load('boxReload.php?id='+btoa(email));
                    swal("Success!", "Successfully Activated", "success");

                }
                else
                {
                    swal("Warning!", "Something wrong", "warning");
                }
            }
        });
        
    });

    });

    //Box Inactive 
    $(".boxInactive").on('click',function(){
        var BoxId=$(this).attr('BoxId');
        var email=$(this).attr('uemail');
        swal({
        title: "Are you sure?",
        text: "You want to inactive merchant",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, inactive it!",
        closeOnConfirm: false
    }, function () {
        //swal("Deleted!", "Your imaginary file has been deleted.", "success");
        $.ajax({
            type:"POST",
            url:"box_Inactive.php",
            data:"m="+BoxId,
            dataType:"text",
            success:function(res)
            {
                if(res==1)
                {
                    console.log('boxReload.php?id='+btoa(email));
                    $("#loadbox").load('boxReload.php?id='+btoa(email));
                    swal("Success!", "Successfully Inactivated", "success");

                }
                else
                {
                    swal("Warning!", "Something wrong", "warning");
                }
            }
        });
        
    });

    });

/*Coin Delete*/
    $(".delCoin").on('click',function(){
        var Id=$(this).attr('id');
        swal({
        title: "Are you sure?",
        text: "You want to Delete ?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, Delete it!",
        closeOnConfirm: false
    }, function () {
        //swal("Deleted!", "Your imaginary file has been deleted.", "success");
        $.ajax({
            type:"POST",
            url:"coin_Del.php",
            data:"id="+Id,
            dataType:"text",
            success:function(res)
            {
                if(res==1)
                {
                    //$("#loaddata").load('coin_manager.php');
                    swal("Success!", "Successfully Deleted", "success");

                }
                else
                {
                    swal("Warning!", "Something wrong", "warning");
                }
            }
        });
        
    });

    });


/*Credential Delete*/
    $(".credDlt").on('click',function(){
        var Id=$(this).attr('id');
        swal({
        title: "Are you sure?",
        text: "You want to Delete ?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, Delete it!",
        closeOnConfirm: false
    }, function () {
        //swal("Deleted!", "Your imaginary file has been deleted.", "success");
        $.ajax({
            type:"POST",
            url:"credDelete.php",
            data:"id="+Id,
            dataType:"text",
            success:function(res)
            {
                if(res==1)
                {
                    //$("#loaddata").load('coin_manager.php');
                    swal("Success!", "Successfully Deleted", "success");

                }
                else
                {
                    swal("Warning!", "Something wrong", "warning");
                }
            }
        });
        
    });

    });


    $(".PlanDlt").on('click',function(){
        var Id=$(this).attr('id');
        swal({
        title: "Are you sure?",
        text: "You want to Delete ?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, Delete Plan!",
        closeOnConfirm: false
    }, function () {
        //swal("Deleted!", "Your imaginary file has been deleted.", "success");
        $.ajax({
            type:"POST",
            url:"planDelete.php",
            data:"id="+Id,
            dataType:"text",
            success:function(res)
            {
                if(res==1)
                {
                    //$("#loaddata").load('coin_manager.php');
                    swal("Success!", "Plan Successfully Deleted", "success");

                }
                else
                {
                    swal("Warning!", "Something wrong", "warning");
                }
            }
        });
        
    });

    });


})