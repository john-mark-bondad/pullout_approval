
<input type='hidden' id='form_pullout_id' value=''/>

<div>
    <label>Status</label>
    <select id='stat_filter' onchange='settblCol();'>
        <option value="0">Pending</option>
        <option value="1">Approved</option>
        <option value="2">Disapproved</option>
        <option value="3">Cancelled</option>
    </select>
</div>

<div style='margin-top:0.5%; padding:1.5%;' class='table-responsive'>


    <table id='t_maintableP' class='table table-bordered table-striped table-condensed table-hover' >
        <thead>
            <tr>


               <th style='width:5px;'></th>
               <th style='width:50px;'>Pull out No.</th>
               <th style='width:50px;'>Supplier/Business Partner</th>
               <th style='width:55px;'>Date requested</th>
               <th style='width:50px;'>Requested By</th>
               <th style='width:50px;' id='ap_col1'>Date Pending</th>
               <th style='width:50px;' id='ap_col2'>Approved By</th>
               <th style='width:50px;'>Status</th>
               <th style='width:50px;'>View</th>
               <th style='width:50px;' id="app" >Approve</th>
               <th style='width:50px;' id="dis">Disapprove</th>
           </tr>
       </thead>
       <tbody>

       </tbody>
   </table>

   <input type='hidden' id='form_sa_addstockcnt' value='0'>

</div>
<script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function(){
            settblCol();

        },500);



    });
</script>