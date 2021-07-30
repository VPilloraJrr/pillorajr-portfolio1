<!DOCTYPE html>
<html>
<head>
    <title>Skill Management | Edit</title>
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
</head>
    <body>
        <div class="card-header flex-center">Edit Skills</div>
        <div class="card-body flex-center"> 
            
            <form action = "/dashboard/skill/edit/<?php echo $data[0]->id; ?>" method = "post">
                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                <table>
                    <tr>
                        <td>Skill Name: </td>
                        <td>
                            <input type = 'text' name = 'skill_name' value = '<?php echo $data[0]->skill_name; ?>'/> 
                        </td>
                    </tr>
                    <tr>
                        <td>Percent: </td>
                        <td>
                            <input type = 'text' name = 'percent' value = '<?php echo $data[0]->percent; ?>'/>
                        </td>
                    </tr>
                    <tr>
                        <td>Logo:   </td>
                        <td>
                            <input type = 'file' name = 'logo' id='logo' value='<?php echo $data[0]->logo; ?>' placeholder='<?php echo $data[0]->logo; ?>'/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan = '2' align="center">
                            <input class="submit btn btn-primary" type = 'submit' value = "Update Skill"  />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>