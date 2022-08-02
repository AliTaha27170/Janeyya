<script src="{{ asset('all.js') }}"></script>
<!-- Stack array for including inline js or scripts -->
@stack('script')
<script>
  
    function printDiv() {
           var printContents = document.getElementById('myTable').innerHTML;
           var originalContents = document.body.innerHTML;
           document.body.innerHTML = printContents;
           window.print();
           document.body.innerHTML = originalContents;
           location.reload();
       }

   $("#myButton").click(function (e) {
       $("#tableExcel").table2excel({
           exclude: ".noExl",
           name: "Worksheet Name",
           filename: "Excel Sheet",
           fileext: ".xls",
           exclude_img: true,
           exclude_links: true,
           exclude_inputs: true
       }); 
   });   

</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js">
</script>
<script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js">
</script>

<script src="{{ asset('dist/js/theme.js') }}"></script>
<script src="{{ asset('js/chat.js') }}"></script>
