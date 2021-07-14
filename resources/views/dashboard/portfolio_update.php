<!DOCTYPE html>
<html>
<head>
    <title>Portfolio Management | Edit</title>
</head>
    <body>
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
    </body>
</html>