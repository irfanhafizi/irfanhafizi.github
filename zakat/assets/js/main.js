
(function() {
  

  "use strict";

  const login_role = document.getElementsByName('login-role');
  const student_login = document.getElementById('student-login');
  const admin_login = document.getElementById('admin-login');
  const interview_login = document.getElementById('interview-login');
  
  // Add event listeners to the radio buttons
  login_role.forEach(function(radioButton) {
    radioButton.addEventListener('change', function() {
      if (this.value === 'student') {
        student_login.classList.remove('d-none');
        admin_login.classList.add('d-none');
        interview_login.classList.add('d-none');
      } else if (this.value === 'admin') {
        student_login.classList.add('d-none');
        admin_login.classList.remove('d-none');
        interview_login.classList.add('d-none');
      } else if (this.value === 'interview') {
        student_login.classList.add('d-none');
        admin_login.classList.add('d-none');
        interview_login.classList.remove('d-none');
      }
    });
  });

  
  
  //validate
  var needsValidation = document.querySelectorAll('.needs-validation')
  
    Array.prototype.slice.call(needsValidation)
      .forEach(function(form) {
        form.addEventListener('submit', function(event) {
          
          form.classList.add('was-validated')
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
  
        }, false)
      })
  
  
 /**
   * Sidebar toggle
   */
 const toggleSidebarBtn = document.querySelector('.toggle-sidebar-btn');
 const body = document.querySelector('body');

 if (toggleSidebarBtn) {
   toggleSidebarBtn.addEventListener('click', function(e) {
     body.classList.toggle('toggle-sidebar');
   });
 }
  document.getElementById("calculateButton").addEventListener("click", function() {
    // Get selected values
    var asnaf = document.querySelector('input[name="asnaf"]:checked').value;
    var pengajian = document.querySelector('input[name="pengajian"]:checked').value;
    var pinjaman = document.querySelector('input[name="pinjaman"]:checked') ? document.querySelector('input[name="pinjaman"]:checked').value : 'TIDAK';
    var yatim = document.querySelector('input[name="yatim"]:checked') ? document.querySelector('input[name="yatim"]:checked').value : 'BUKAN YATIM';

    // Calculate total price based on selected values
    var amt1 = 0;
    if (asnaf == 'FAKIR') {
    if (pengajian == 'DIPLOMA') {
      if (pinjaman == 'TIDAK') {
        amt1 = amt_fakir_diploma_0;
      } else {
        amt1 = amt_fakir_diploma_1;
      }
    } else if (pengajian == 'IJAZAH') {
      if (pinjaman == 'TIDAK') {
        amt1 = amt_fakir_ijazah_0;
      } else {
        amt1 = amt_fakir_ijazah_1;
      }
    } else if (pengajian == 'MASTER/PHD') {
      if (pinjaman == 'TIDAK') {
        amt1 = amt_fakir_master_0;
      } else {
        amt1 = amt_fakir_master_1;
      }
    }
  } else if (asnaf == 'MISKIN') {
    if (pengajian == 'DIPLOMA') {
      if (pinjaman == 'TIDAK') {
        amt1 = amt_miskin_diploma_0;
      } else {
        amt1 = amt_miskin_diploma_1;
      }
    } else if (pengajian == 'IJAZAH') {
      if (pinjaman == 'TIDAK') {
        amt1 = amt_miskin_ijazah_0;
      } else {
        amt1 = amt_miskin_ijazah_1;
      }
    } else if (pengajian == 'MASTER/PHD') {
      if (pinjaman == 'TIDAK') {
        amt1 = amt_miskin_master_0;
      } else {
        amt1 = amt_miskin_master_1;
      }
    }
  }
  
    var totalPrice = (yatim == 'YA') ? amt1 + amt_yatim : amt1;
    
    // Display total price
    document.getElementById("totalPrice").textContent = "Jumlah Awal: RM" + totalPrice;
  });

  

  /**
   * Navbar links active state on scroll
   */
  let navbarlinks = select('#navbar .scrollto', true)
  const navbarlinksActive = () => {
    let position = window.scrollY + 200
    navbarlinks.forEach(navbarlink => {
      if (!navbarlink.hash) return
      let section = select(navbarlink.hash)
      if (!section) return
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        navbarlink.classList.add('active')
      } else {
        navbarlink.classList.remove('active')
      }
    })
  }
  window.addEventListener('load', navbarlinksActive)
  onscroll(document, navbarlinksActive)

  /**
   * Toggle .header-scrolled class to #header when page is scrolled
   */
  let selectHeader = select('#header')
  if (selectHeader) {
    const headerScrolled = () => {
      if (window.scrollY > 100) {
        selectHeader.classList.add('header-scrolled')
      } else {
        selectHeader.classList.remove('header-scrolled')
      }
    }
    window.addEventListener('load', headerScrolled)
    onscroll(document, headerScrolled)
  }

  /**
   * Initiate tooltips
   */
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })

})();

function closeModal() {
  const modal = document.querySelector('.modal1');
  modal.style.display = 'none';
}

//Search function
function searchtable(){
  var input, filter, table, tr, td, i, j, txtValue, found, row, col, newRow, newCol;
  input = document.getElementById("searchtableinput");
  filter = input.value.toUpperCase();
  table = document.getElementById("table");
  tr = table.getElementsByTagName("tr");
  found=false;

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td");
    
    for (j = 0; j < td.length; j++) {
      txtValue = td[j].textContent || td[j].innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
        found=true;
        break;
      } else {
        tr[i].style.display = "none";
      }
    }       
  }

  if (!found) {
    row = table.rows[0];
    col = row.cells.length;
    newRow = table.insertRow(-1);
    newCol = newRow.insertCell(0);
    newCol.colSpan = col;
    newCol.className = "text-center no-result";
    newCol.textContent = "No result match";
  }else {
    var noResultRow = table.querySelector(".no-result");
    while (noResultRow) {
      noResultRow.remove();
      noResultRow = table.querySelector(".no-result");
    }
  }
}

function exportToExcel() {
  var table = document.getElementById("table");
  var originalTitle = document.querySelector(".c-title").textContent.trim();
  
  // Shorten or modify the title to fit within 31 characters
  var title = originalTitle.substring(0, 31);

  // Convert the table to a worksheet object
  var worksheet = XLSX.utils.table_to_sheet(table);

  // Create a workbook and add the modified worksheet
  var workbook = XLSX.utils.book_new();
  XLSX.utils.book_append_sheet(workbook, worksheet, title);

  // Export the workbook as an Excel file
  XLSX.writeFile(workbook, title + ".xlsx");
}

function printAsPDF() {
// Create a new window or tab for the PDF

var title = document.querySelector(".c-title").textContent.trim();
var printWindow = window.open('', '_blank');

// Get the content to be printed
var contentToPrint = document.getElementById('table').innerHTML;

contentToPrint = contentToPrint.replace(/<a\b[^>]*>(.*?)<\/a>/gi, '');

// Create the printable document with custom CSS styles
var printableDocument = `
  <html>
    <head>
      <style>
        body {
          font-family: "Open Sans", sans-serif;
          background: #f6f9ff;
          color: rgb(11, 11, 11);
          text-align:center;
          justify-content: center;
          align-items: center;
        }
        img{
          width: 20%;
        }
        h2{
          margin-top:4rem;
        }
        table{
          width:100%;
          border-collapse: collapse;
        }
        table > thead > tr{
          border-bottom: 1px solid #d9d9d9;
        }
        table > tbody > tr{
          text-align:center;
          border-bottom: 1px solid #d9d9d9;
        }
      </style>
    </head>
    <body>
      <img src="../assets/img/uitm.png">
      <h2>${title}</h2>
      <hr>
      <table>
      ${contentToPrint}
      </table>
    </body>
  </html>
`;

// Write the printable document content to the new window or tab
printWindow.document.open();
printWindow.document.write(printableDocument);
printWindow.document.close();
printWindow.document.title = title;
// Wait for the printable document to fully load before printing
printWindow.onload = function() {
  printWindow.print();
};
}
