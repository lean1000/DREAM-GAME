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
        
        private string emailCorreto = "chrisgreg@gmail.com";
        private string senhaCorreta = "chrisgreg";

        public Form1()
        {
            InitializeComponent();
            textBoxSenha.PasswordChar = '*';
        }

        private void buttonEntrar_Click(object sender, EventArgs e)
        {
            if (textBoxEmail.Text == "" || textBoxSenha.Text == "")
            {
                label.Text = "Por favor, preencha ambos os campos.";
                label.ForeColor = Color.Red;
                return;
            }

            if (textBoxEmail.Text == emailCorreto && textBoxSenha.Text == senhaCorreta)
            {
                label.Text = "Login bem-sucedido!";
                label.ForeColor = Color.Green;

                Menu form = new Menu();
                form.ShowDialog();
                this.Hide();
            }
            else
            {
                label.Text = "E-mail ou senha inválidos.";
                label.ForeColor = Color.Red;
            }
        }

        
        private void checkBoxMostrarSenha_CheckedChanged(object sender, EventArgs e)
        {
            if (checkBoxMostrarSenha.Checked)
            {
                textBoxSenha.PasswordChar = '\0'; // Mostra a senha
            }
            else
            {
                textBoxSenha.PasswordChar = '*'; // Oculta a senha
            }
        }
    }
}

