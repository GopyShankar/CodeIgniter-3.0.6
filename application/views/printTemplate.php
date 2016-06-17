<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
       <meta content="text/html; charset=UTF-8" http-equiv="content-type">
       <title>Header and Footer example</title>
       <style type="text/css">
            @page {
                margin: 2cm;
            }
            body {
                font-family: sans-serif;
                margin: 0.5cm 0;
                text-align: justify;
            }
            #header,
            #footer {
                position: fixed;
                left: 0;
                right: 0;
                color: #aaa;
                font-size: 0.9em;
                background-color: white;
            }
            #header {
                top: 0;
                height: 1cm;
                border-bottom: 0.1pt solid #aaa;
            }
            #footer {
                bottom: 0;
                border-top: 0.1pt solid #aaa;
            }
            #header table,
            #footer table {
                width: 100%;
                border-collapse: collapse;
                border: none;
            }
            .page-number {
                text-align: center;
            }
            .page-number:before {
                content: "Page " counter(page);
            }
            .content-table{
                padding-top: 1.5cm;
                padding-bottom: 1.5cm;
            }
       </style>
    </head>
    <body>
       <div id="header">
          <table>
             <tbody>
                <tr>
                   <td>Example document</td>
                   <td style="text-align: right;">Author</td>
                </tr>
             </tbody>
          </table>
       </div>
       <div id="footer">
          <div class="page-number"></div>
       </div>
       <table class="content-table" style="width:100%">
        <thead>
            <tr>
                <th>S no</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Points</th>
            </tr>
        </thead>
            <?php $count=0; for($i=0; $i<=50; $i++){?>
            <tr>
                <td><?php echo $count; ?></td>
                <td>Jill</td>
                <td>Smith</td>
                <td>50</td>
            </tr>
            <?php $count++;} ?>
        </table>
    </body>
 </html>
