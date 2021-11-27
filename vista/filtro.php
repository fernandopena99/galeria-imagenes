<?php

    require "../modelo/conexion.php";

    $query_values = $_POST;
    

    
    if($query_values)
    {
        
        $values = [];
        $queries = [];

        foreach ($query_values as $field_name => $field_value)
        {
            foreach ($field_value as $value)
            {
                $values[$field_name][] = " {$field_name} = '{$value}'";
            }
        }

        foreach ($values as $field_name => $field_values)
        {
            $queries[$field_name] = "(".implode(" OR ", $field_values).")";
        }

       
       

    }

    $query = "SELECT * FROM imagecrud ";
$imagecrud = $connection->query($query);

$image_list = [];

while($image = $imagecrud->fetch(PDO::FETCH_ASSOC))
{
    $image_list[$image["ID"]] = $image;
}

echo json_encode($image_list);
