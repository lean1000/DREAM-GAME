using Microsoft.Extensions.Configuration;
using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Configuration;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;





namespace DreamGamePi
{
    public partial class Menu : Form
    {
        public Menu()
        {
            InitializeComponent();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            EditarProd form = new EditarProd();
            form.ShowDialog();
        }

        private void buttonLimpar_Click(object sender, EventArgs e)
        {
            textBoxTitulo.Text = "";
            textBoxPreco.Text = "";
            maskedTextBoxAno.Text = "";
            textBoxDesenvolvedor.Text = "";
            comboBoxAvaliacao.Text = "";
            richTextBoxDescricao.Text = "";
            textBoxImagem.Text = "";
            textBoxTitulo.Focus();
        }

        private void buttonUsuario_Click(object sender, EventArgs e)
        {
            EditarUsuarios form = new EditarUsuarios();
            form.ShowDialog();
        }

        private void buttonCadastrar_Click(object sender, EventArgs e)
        {
            string conexaoString = "Server=185.213.81.205;Port=3306;Database=u336727971_db_dreamgame;Uid=u336727971_hostinger;Pwd=DreamGame@1;";

            //Defina a inserção de registro no BD

            string query = "INSERT INTO tb_produtos (Titulo, Imagen, Valor, Ano, Desenvolvedor, Descricao, Avaliacao, ID_genero) VALUES (@Titulo, @Imagen, @Valor, @Ano, @Desenvolvedor, @Descricao, @Avaliacao ,@ID_genero)";

            //Crie uma conexão com o BD

            using (MySqlConnection conexao = new MySqlConnection(conexaoString))
            {
                try
                {
                    //Abre a conexão
                    conexao.Open();
                    //Crie o comando SQL
                    using (MySqlCommand comando = new MySqlCommand(query, conexao))
                    {
                        //Adicionar os parâmetros com os valores dos TextBox
                        comando.Parameters.AddWithValue("@Titulo", textBoxTitulo.Text);
                        comando.Parameters.AddWithValue("@Imagen", textBoxImagem.Text);
                        comando.Parameters.AddWithValue("@Valor", textBoxPreco.Text);
                        comando.Parameters.AddWithValue("@Ano", maskedTextBoxAno.Text);
                        comando.Parameters.AddWithValue("@Desenvolvedor", textBoxDesenvolvedor.Text);
                        comando.Parameters.AddWithValue("@Descricao", richTextBoxDescricao.Text);
                        comando.Parameters.AddWithValue("@Avaliacao", comboBoxAvaliacao.Text);
                        comando.Parameters.AddWithValue("@ID_genero", comboBoxGenero.Text);

                        // Executa o comando de inserção
                        comando.ExecuteNonQuery();

                        MessageBox.Show("Dados inseridos com sucesso!");
                    }
                }
                catch (Exception ex)
                {
                    // Em caso de erro, exiba mensagem do erro
                    MessageBox.Show("Erro: " + ex.Message);
                }
            }
        }

        private void buttonUsuarios_Click(object sender, EventArgs e)
        {
            EditarUsuarios form = new EditarUsuarios();
            form.ShowDialog();
        }

        private void comboBoxGenero_SelectedIndexChanged(object sender, EventArgs e)
        {

        }

        private void pictureBoxImagem_Click(object sender, EventArgs e)
        {

        }
    }
}

