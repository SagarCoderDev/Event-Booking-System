<?php
// Example PHP code that generates dynamic content.
echo "<html><head><title>Print Page</title></head><body>";
?>

<div id="printArea">
    <h1>This is the section to print</h1>
    <p>This content will be printed when you click the print button.</p>
</div>

<div>
    <h1>This section will not be printed</h1>
    <p>Additional content here that will not be printed.</p>
</div>

<!-- Button to trigger print -->
<button onclick="printContent('printArea')">Print This Section</button>

<script>
// JavaScript function to print content by ID
function printContent(id) {
    var content = document.getElementById(id).innerHTML;  // Get the content inside the element with the provided id
    var win = window.open('', '', 'height=500,width=800');  // Open a new window for printing
    win.document.write('<html><head><title>Print</title></head><body>');
    win.document.write(content);  // Write the content inside the new window
    win.document.write('</body></html>');
    win.document.close();  // Close the document
    win.print();  // Trigger the print dialog
}
</script>

</body></html>
