<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css-css/style.css">
  <link rel="stylesheet" href="css-css/rps.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />
</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="tile-title"> Quản lý danh mục</h3>
      </div>

    </div>

    <div class="row">
      <div class="col-md-12 ">
        <div class="col-xs-3">
          <a href="index.php?act=adddm"><i class="fas fa-plus"></i>Thêm mới</a>
        </div>
      </div>
      <div class="col-md-12 ">
        <div class="dataTables_length" id="sampleTable_length">
          <form action="index.php?act=listdm" method="post">
            <input type="text" name="keyw" placeholder="Tìm sản phẩm">
            <label>Danh mục
              <select name="id_dm">
                <option value="0" selected>Tất cả</option>
                <?php
                foreach ($listdanhmuc as $danhmuc) {
                  extract($danhmuc);
                  echo '<option value="' . $id_dm . '">' . $name_dm . '</option>';
                }
                ?>
              </select>
              <input type="submit" value="Tìm kiếm" name="timkiem">

            </label>
          </form>
        </div>
      </div>
    </div>

    <div class="row">

    </div>
    <div class="container">
      <div class="row">
        <table class="col-md-12">

          <tr>

            <th>ID Danh Mục</th>
            <th>Tên Danh Mục</th>
            <th>Hình ảnh</th>
            <th>Hành Động</th>
          </tr>

          <?php
            foreach($listdanhmuc as $danhmuc){
              extract($danhmuc);
              $suadm = "index.php?act=suadm&id_dm=".$id_dm;                  
              $xoadm = "index.php?act=xoadm&id_dm=".$id_dm;
              $hinhpath ="../upload/".$anh_dm;
                if (is_file($hinhpath)) {
                    $hinh = "<img src= '" .$hinhpath. "'height='80px'>";
                } else {
                    $hinh = "No file img!";
                }
              echo '<tr role="row" class="odd">
              <td>'.$id_dm.'</td>
              <td>'.$name_dm.'</td>
              <td>'.$hinh.'</td>
              <td>
                <a href="'.$xoadm.'"><button type="button" onclick="return confirm(\'Bạn có chắc chắn muốn xóa\')"><i class="fas fa-trash-alt"></i></button></a>
                <a href="'.$suadm .'" type="button"><i class="fas fa-edit"></i></a>
              </td>
            </tr>';
            }
          
          ?>
          


          <!-- <tr role="row" class="odd">
                      <td class="sorting_1">1</td>
                      <td>53</td>
                      <td>bánh kẹo ngọt</td>
                      <td><img src=""alt=""height="50px;"/></td>
                      <td>
                        <button type="button"><i class="fas fa-trash-alt"></i></button>
                        <a href="#"type="button"><i class="fas fa-edit"></i></a>
                      </td>
                    </tr> -->



        </table>
      </div>
    </div>


  </div>





  <script>
    let link = document.querySelectorAll(".act-list")

    link.forEach(element => {
      element.onclick = () => {
        link.forEach(nav => {
          nav.classList.remove("sidebar-text-thin");
        })
        element.classList.add("sidebar-text-thin");
      }
    })



    let close = document.querySelector(".delete")
    let menu = document.querySelector(".sidebar")
    let bar = document.querySelector("span.bar")
    let icon = document.querySelector("span.bar i")
    bar.onclick = () => {
      menu.classList.toggle("off")
      let isIcon = menu.classList.contains('off')
      icon.classList = isIcon ? 'fa-solid fa-xmark' : 'fa-solid fa-bars'
      close.style.display = "block"
    }

    close.onclick = () => {
      menu.classList.toggle("off")
      let isIcon = menu.classList.contains('off')
      icon.classList = isIcon ? 'fa-solid fa-xmark' : 'fa-solid fa-bars'
      close.style.display = "none"

    }



  </script>

</body>

</html>