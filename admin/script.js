function showContent(section) {
  const content = document.getElementById("main-content");

  if (section === "product") {
    content.innerHTML = `
        <div class="content-head"><h2>Quản lý sản phẩm</h2>
        <button class="add">Thêm sản phẩm</button></div>
        <table border="1px">
            <tr>
                <th>ID</th> <th>Tên sản phẩm</th> <th>Giá</th> <th>Số lượng</th> <th>Chỉnh sửa</th>
            </tr>
            <tr>
                <td>001</td> <td>Cát Đậu Nành ACROPET</td> <td>85.000₫</td> <td>20</td> <td><a id="delete">Xóa</a>|<a id="modify">Sửa</a></td>
            </tr>
            <tr>
                <td>001</td> <td>Cát Đậu Nành ACROPET</td> <td>85.000₫</td> <td>20</td> <td><a id="delete">Xóa</a>|<a id="modify">Sửa</a></td>
            </tr>
        </table>
    `;
  }

  else if (section === "order") {
    content.innerHTML = `
      <div class="content-head">
        <h2>Quản lý đơn hàng</h2>
        <button class="add">Thêm đơn hàng</button>
      </div>
        <table border="1px">
            <tr>
                <th>ID</th> <th>ID_User</th> <th>Ngày đặt</th> <th>Trạng thái</th> <th>Tổng tiền</th> <th>Chỉnh sửa</th>
            </tr>
            <tr>
                <td>DH001</td> <td>5</td> <td>20-6-2025</td> <td>Đang vận chuyển</td> <td>500.000₫</td> <td><a id="delete">Xóa</a>|<a id="modify">Sửa</a></td>
            </tr>
            <tr>
                <td>DH002</td> <td>8</td> <td>16-2-2025</td> <td>Đã giao hàng</td> <td>375.000₫</td> <td><a id="delete">Xóa</a>|<a id="modify">Sửa</a></td>
            </tr>
        </table>
    `;
  }

  else if (section === "ware") {
    content.innerHTML = `
      <div class="content-head">
        <h2>Quản lý kho hàng</h2>
      </div>
      <table border="1px">
            <tr>
                <th>ID</th> <th>Tên sản phẩm</th> <th>Giá</th> <th>Số lượng</th> <th>Thời gian</th> <th>Chỉnh sửa</th>
            </tr>
            <tr>
                <td>SP001</td> <td>Cát Đậu Nành ACROPET</td> <td>70.000₫</td> <td>15</td> <td>14-3-25</td> <td><a id="delete">Xóa</a>|<a id="modify">Sửa</a></td>
            </tr>
            <tr>
                <td>SP008</td> <td>Garnado trứng sữa</td> <td>90.000₫</td> <td>140</td> <td>20-6-25</td> <td><a id="delete">Xóa</a>|<a id="modify">Sửa</a></td>
            </tr>
        </table>
    `;
  }

  else if (section === "account") {
    content.innerHTML = `
      <div class="content-head">
        <h2>Quản lý tài khoản</h2>
      </div>
      <table border="1px">
            <tr>
                <th>ID</th> <th>Username</th> <th>Phone</th> <th>Email</th> <th>Role</th> <th>Chỉnh sửa</th>
            </tr>
            <tr>
                <td>101</td> <td id="name_acc">Lê Tấn Hào</td> <td>0768109415</td> <td>haolt0285@ut.edu.vn</td> <td>Admin</td> <td><a id="delete">Xóa</a>|<a id="modify">Sửa</a></td>
            </tr>
            <tr>
                <td>102</td> <td id="name_acc">Phạm Triều Sang</td> <td>0367693892</td> <td>sangpt1275@ut.edu.vn</td> <td>Admin</td> <td><a id="delete">Xóa</a>|<a id="modify">Sửa</a></td>
            </tr>
        </table>
    `;
  }

  const menuLinks = document.querySelectorAll(".menu a");
  menuLinks.forEach(link => link.classList.remove("active"));
  document.getElementById(section).classList.add("active");
}