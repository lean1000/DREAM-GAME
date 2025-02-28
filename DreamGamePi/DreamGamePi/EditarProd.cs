using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace DreamGamePi
{
    public partial class EditarProd : Form
    {
        public EditarProd()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            EditarProd form = new EditarProd();
            form.ShowDialog();
        }

        }
    }
