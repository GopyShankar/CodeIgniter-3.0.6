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
                margin-top: 1.5cm;                
            }
            /*hr {
                page-break-after: always;
                border: 0;
            }*/
            @media print {
                #footer {
                    page-break-after: always;
                }
                tr{
                    page-break-inside: avoid;
                }
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
              <th>First Name</th>
              <th>Last Name</th>
              <th>Points</th>
            </tr>
        </thead>
            <?php for($i=0; $i<=100; $i++){?>
            <tr>
              <td>Jill</td>
              <td>Smith</td>
              <td>50</td>
            </tr>
            <tr>
              <td>Eve</td>
              <td>Jackson</td>
              <td>94</td>
            </tr>
            <tr>
              <td>John</td>
              <td>Doe</td>
              <td>80</td>
            </tr>
            <?php } ?>
        </table>
    </body>
 </html>
