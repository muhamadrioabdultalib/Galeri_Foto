<?php
    require"function.php";
    $cekId= $_GET["id"];
    
    $query="DELETE FROM albumfoto WHERE id=$cekId";
    mysqli_query($koneksi,$query );

    echo "
        <script>
            alert('data berhasil dihaus!');
            document.location.href='admin.php';
        </script>
    ";
    
?>