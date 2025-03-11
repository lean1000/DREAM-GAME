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
    public partial class Form1 : Form
    {
        


        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            string emailCorreto = "ChrisGreg@gmail.com";
            string senhaCorreta = "chrisgreg";

            if (textBoxEmail.Text == "" || textBoxSenha.Text == "")
            {
                label.Text = "Por favor, preencha ambos os campos.";
                label.ForeColor = System.Drawing.Color.Red;
                return;
            }

            if (textBoxEmail.Text == emailCorreto && textBoxSenha.Text == senhaCorreta)
            {
                label.Text = "Login bem-sucedido!";
                label.ForeColor = System.Drawing.Color.Green;

                Menu form = new Menu();
                form.ShowDialog();
                this.Hide();
            }

            else
            {
                label.Text = "E-mail ou senha inválidos.";
                label.ForeColor = System.Drawing.Color.Red;
            }
        }
    }
}
