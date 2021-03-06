using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace redbusIndia
{
    public partial class index : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {

        }

        protected void search_btn_Click(object sender, EventArgs e)
        {
            Response.Redirect("http://localhost:50618/rpool.aspx");
        }
    }
}