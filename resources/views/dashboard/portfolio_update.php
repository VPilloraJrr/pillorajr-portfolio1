<!DOCTYPE html>
<html>
<head>
    <title>Portfolio Management | Edit</title>
</head>
<style>
        div{
            border: 1px solid grey;
            margin-left:10%;
            margin-right:10%;
        }
        td{
            padding:5px;
        }
        div.card-body form{
            margin-top:10px;
            padding-bottom:10px;
        }
        div.card-header{
            background: #f7f7f7;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            padding-top: 2%;
            padding-bottom: 2%;
            margin-top:10px;    
        }
        .flex-center {
            align-content: center;
            display: grid;
            justify-content: center;
        }
        .submit{
            margin-top: 20px;
            padding-left:100px;
            padding-right:100px;
            padding-top: 5px;
            padding-bottom: 5px;
        }
    </style>
    <body>
        <div class="card-header flex-center">Edit Portfolio</div>
        <div class="card-body flex-center">
            <form action = "/dashboard/portfolio/edit/<?php echo $data[0]->id; ?>" method = "post">
                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                <table>
                    <tr>
                        <td>Project Name</td>
                        <td>
                            <input type = 'text' name = 'project_name' value = '<?php echo $data[0]->project_name; ?>'/> </td>
                    </tr>
                    <tr>
                        <td>Client</td>
                        <td>
                            <input type = 'text' name = 'client' value = '<?php echo$data[0]->client; ?>'/>
                        </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>
                            <input type = 'text' name = 'description' value = '<?php echo$data[0]->description; ?>'/>
                        </td>
                    </tr>
                    <tr>
                        <td>Screenshot</td>
                        <td>
                            <input type = 'file' name = 'screenshot' value = '<?php echo$data[0]->screenshot; ?>'/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan = '2'>
                            <input type = 'submit' value = "Update Portfolio" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>