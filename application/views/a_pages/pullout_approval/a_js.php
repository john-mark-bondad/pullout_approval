
<script type="text/javascript">


	function setcont(n){
		$('.setcont').hide();
		$('#setcont'+n).show();
	}

	function SYS_TableServerside2(url,tbl){
		SYS_TableStart(tbl);  
		$(tbl).fadeIn(); 
		var oTable=$(tbl).DataTable({
			"processing": true,
			"serverSide": true,
			"bSort": true,
			"bInfo": false,
			"bFilter": true,
			"ajax": {
				"url": url,
				"dataType": "json",
				"error": function(jqXHR, textStatus, errorThrown){
					$(tbl+' tbody').html("<tr><td colspan='10'>No Results Found</td></tr>");
					$(tbl+' .dataTables_info').text("Showing 0 to 0 of 0 entries");
				}
			},
			"columnDefs":[{
				"target":[0,5],
				"orderable":false
			}],
			"aLengthMenu": [[5,10,25, 50, 75, 100], [5,10,25, 50, 75, 100]],
			"pageLength": 5

		});

		$(tbl+'_filter input').unbind();
		$(tbl+'_filter input').bind('change', function() {
			oTable.search(this.value).draw();    
		}); 


		$(tbl).css({'visibility':'visible'});
	}




	function settblCol(){
		var status=$('#stat_filter').val();
    // console.log(status);
    if(status==0){
     $('#ap_col1').text("Pending Date");
     $('#ap_col2').text("Approved By");

     $('#app').show();
     $('#dis').show();
     var link=URL+"index.php/pullout_approval/loadPendingSetlist";
     SYS_TableServerside2(link,'#t_maintableP');
   }
   else if(status==1){
     $('#ap_col1').text("Approved Date");
     $('#ap_col2').text("Approved By");

     $('#app').hide();
     $('#dis').hide();
     var link=URL+"index.php/pullout_approval/loadApprovedSetlist";
     SYS_TableServerside2(link,'#t_maintableP');
        // alert(link);
      }
      else if(status==2){
       $('#ap_col1').text("Disapprove Date");
       $('#ap_col2').text("Disapproved By");

       $('#app').hide();
       $('#dis').hide();
       var link=URL+"index.php/pullout_approval/loadDisapprovedSetlist";
       SYS_TableServerside2(link,'#t_maintableP');
         // alert(link);
       }
       else if(status==3){
        $('#ap_col1').text("Cancelled Date");
        $('#ap_col2').text("Cancelled By");

        $('#app').hide();
        $('#dis').hide();
        var link=URL+"index.php/pullout_request/loadPullOutRequestCancelledSetlist";
        SYS_TableServerside2(link,'#t_maintable');
      }
    }

    function SYS_pending_setlist(){
     var brid=$('#filter_branchid').val();
     var containerid=$('#filter_container').val();
     var status=$("#stat_filter").val();
     var link=URL+"index.php/pullout_approval/loadPendingSetlist?name=Xssd23SqQ&brid="+brid+"&containerid="+containerid+"&status="+status+"";
     SYS_TableServerside2(link,'#t_maintableP'); 
     $('#t_maintable').css({'visibility':'visible'});

   }


   function approved_setlist(){

     var brid=$('#filter_branchid').val();
     var containerid=$('#filter_container').val();

     var status=$("#stat_filter").val();

     var link=URL+"index.php/pullout_approval/loadApprovedSetlist?name=Xssd23SqQ&brid="+brid+"&containerid="+containerid+"&status="+status+"";
     SYS_TableServerside2(link,'#t_maintableA'); 
     $('#t_maintable').css({'visibility':'visible'});

   }




function loadApprovalSetlist(){

	var brid=$('#filter_branchid').val();
	var containerid=$('#filter_container').val();

	var status=$("#stat_filter").val();

	var link=URL+"index.php/pullout_approval/loadApprovedSetlist?name=Xssd23SqQ&brid="+brid+"&containerid="+containerid+"&status="+status+"";
	SYS_TableServerside2(link,'#t_maintable'); 
	$('#t_maintable').css({'visibility':'visible'});

}



function view_pending(x){
	setcont(2);
	var str="";
	var date_requested=$("#tbl_pending_requested_date"+x).val(); 
	var pullout_num=$("#tbl_pullout_num"+x).val(); 
	var description=$("#tbl_description"+x).val(); 
	var bpname=$("#tbl_bpname"+x).val();
	var api_id=$("#tbl_id"+x).val();
                // hali sa pending setlist
                // var pullout_qty=$("#tbl_pending_pullout_qty"+x).val(); 
                $('#sa_api_id').val(api_id);
                $('#sa_wrr').val(pullout_num);
                $('#sa_bpname').val(bpname);
                $('#sa_desc').val(description);
                $('#sa_request_date').val(date_requested);
                // $('#sa_pending_pullout_qty').val(pullout_qty);

                var pid=$('#tbl_pid'+x).val();
                var sku=$('#tbl_sku'+x).val();
                var product_name=$('#tbl_product_name'+x).val();
                    // var current_stock=$('#tbl_currentStock'+x).val();
                    var pullout_qty=$('#tbl_pending_pullout_qty'+x).val();
                    var status=$('#tbl_status'+x).val();


                    var new_qty1=$('#tbl_p_new_qty1'+x).val();

                    var current_stock=$('#tbl_p_current_stock'+x).val();
                    // alert(current_stock);
                    var pq_id=$('#tbl_p_pq_id'+x).val();
                    var api_sku=$('#tbl_p_sku'+x).val();
                    var new_stock=$('#tbl_p_new_stock'+x).val();
// alert(bpname);
                            // .append will insert a new row
                            $('#sa_cont tbody').html(`
                            	<tr id='tblC_row'>
                            	<td>
                            	`+sku+`
                            	</td>
                            	<td>`+product_name+`</td>
                            	<td>`+pullout_qty+`</td>
                            	</tr>
                            	`);
} // end view_approval




function view_approved(x){
	setcont(4);
	var str="";
	var approved_date=$("#tbl_approved_date"+x).val(); 
	var pullout_num=$("#tbl_pullout_num"+x).val(); 
	var description=$("#tbl_description"+x).val(); 
	var bpname=$("#tbl_bpname"+x).val();
	var api_id=$("#tbl_id"+x).val();
                // hali sa pending setlist
                // var pullout_qty=$("#tbl_pending_pullout_qty"+x).val(); 
                $('#approved_api_id').val(api_id);
                $('#approved_po_num').val(pullout_num);
          // alert(pullout_num);
          $('#approved_bpname').val(bpname);
          $('#approved_desc').val(description);
          $('#approved_date').val(approved_date);
                // $('#sa_pending_pullout_qty').val(pullout_qty);

                var pid=$('#tbl_pid'+x).val();
                var sku=$('#tbl_sku'+x).val();
                var product_name=$('#tbl_product_name'+x).val();
                    // var current_stock=$('#tbl_currentStock'+x).val();
                    var pullout_qty=$('#tbl_pending_pullout_qty'+x).val();
                    var status=$('#tbl_status'+x).val();


                      // var status=$('#tbl_status'+x).val();

// alert(bpname);
                            // .append will insert a new row
                            $('#sa_cont tbody').html(`
                            	<tr id='tblC_row'>
                            	<td>
                            	`+sku+`
                            	</td>
                            	<td>`+product_name+`</td>
                            	<td>`+pullout_qty+`</td>
                            	</tr>
                            	`);
} // end view_approval



function view_disapproved(x){
	setcont(5);
	var str="";
	var disapproved_date=$("#tbl_disapproved_date"+x).val(); 
	var pullout_num=$("#tbl_pullout_num"+x).val(); 
	var description=$("#tbl_description"+x).val(); 
	var bpname=$("#tbl_bpname"+x).val();
	var api_id=$("#tbl_id"+x).val();
                // hali sa pending setlist
                // var pullout_qty=$("#tbl_pending_pullout_qty"+x).val(); 
                $('#disapproved_api_id').val(api_id);
                $('#disapproved_po_num').val(pullout_num);
          // alert(pullout_num);
          $('#disapproved_bpname').val(bpname);
          $('#disapproved_desc').val(description);
          $('#disapproved_date').val(disapproved_date);
                // $('#sa_pending_pullout_qty').val(pullout_qty);

                var pid=$('#tbl_pid'+x).val();
                var sku=$('#tbl_sku'+x).val();
                var product_name=$('#tbl_product_name'+x).val();
                    // var current_stock=$('#tbl_currentStock'+x).val();
                    var pullout_qty=$('#tbl_pending_pullout_qty'+x).val();
                    var status=$('#tbl_status'+x).val();

// alert(bpname);
                            // .append will insert a new row
                            $('#sa_cont tbody').html(`
                            	<tr id='tblC_row'>
                            	<td>
                            	`+sku+`
                            	</td>
                            	<td>`+product_name+`</td>
                            	<td>`+pullout_qty+`</td>
                            	</tr>
                            	`);
} // end view_disapproval







// --------for Approval

function pullout_approval_process_save(x){

	SYS_confirm("Do you wish to Proceed?","Information will be saved to the database","warning","Yes","No",function(){
		sweetAlertClose();  

		var cnt=parseInt($('#form_addstockcnt').val());
		var brid=$('#filter_branchid').val();
		var containerid=$('#filter_container').val();
                        // global var - this used in saved_by
                        var user_accountid=$('#user_person_accountid').val();
                        var pullout_num=$('#tbl_pullout_num'+x).val();


                        // hali sa pending setlist
                        var pullout_id=$("#tbl_pending_pullout_id"+x).val();

                        $('#form_p_pullout_id').val(pullout_id);
                        $('#form_pullout_num').val(pullout_num);


                        var inv_id=parseInt($('#tbl_p_inv_id'+x).val());
                        var inv_sku=parseInt($('#tbl_p_inv_sku'+x).val());
                        var current_stock=parseInt($('#tbl_p_current_stock'+x).val());
                        var pullout_items_qty=parseInt($('#pullout_items_qty'+x).val());
                         var new_qtyP=parseInt($('#tbl_p_new_qty1'+x).val());


// alert(new_qtyP);
                        var pullout_qty=$('#tbl_pending_pullout_qty'+x).val();

                        var new_stock=$('#tbl_p_new_stock'+x).val();
                        var api_sku=$('#tbl_p_sku'+x).val();
                        var pq_id=$('#tbl_p_pq_id'+x).val();
                        // alert(current_stock);
// alert(pq_id);

$.ajax({
 url:URL+"index.php/pullout_approval/loadApprovalSave",
 method:"POST",
 data:{
  brid:brid,
  containerid:containerid,
  pullout_num:pullout_num,
  pullout_id:pullout_id,
  current_stock:current_stock,
  pullout_items_qty:pullout_items_qty,
  new_qtyP:new_qtyP,
  pullout_qty:pullout_qty,
  inv_id:inv_id,
  inv_sku:inv_sku,
  new_stock:new_stock,
  api_sku:api_sku,
  pq_id:pq_id,
  user_accountid:user_accountid
},
success:function(data){
    // n=JSON.parse(data);
    // alert(n);
    // debugger;
    console.log(data);
    SYS_pending_setlist();  
  },
  error:function(err){
   console.log(err);
   alert("Network problem detected");
 }
});


});

}


// to disapprove
function pullout_disapproval_process_save(x){

	SYS_confirm("Do you wish to Proceed?","Information will be saved to the database","warning","Yes","No",function(){
		sweetAlertClose();  

		var cnt=parseInt($('#form_addstockcnt').val());
		var brid=$('#filter_branchid').val();
		var containerid=$('#filter_container').val();
                        // global var - this used in saved_by
                        var user_accountid=$('#user_person_accountid').val();
                        var pullout_num=$('#tbl_pullout_num'+x).val();


                        // hali sa pending setlist
                        var pullout_id=$("#tbl_pending_pullout_id"+x).val();

                        $('#form_p_pullout_id').val(pullout_id);
                        $('#form_pullout_num').val(pullout_num);


// alert(user_accountid);
$.ajax({
	url:URL+"index.php/pullout_approval/loadDisapprovalSave",
	method:"POST",
	data:{
		brid:brid,
		containerid:containerid,
		pullout_num:pullout_num,
		pullout_id:pullout_id,
		user_accountid:user_accountid
	},
	success:function(data){
    // n=JSON.parse(data);
    // alert(n);
    // debugger;
    console.log(data);
    SYS_pending_setlist();  
  },
  error:function(err){
   console.log(err);
   alert("Network problem detected");
 }
});


});

}
















</script>
