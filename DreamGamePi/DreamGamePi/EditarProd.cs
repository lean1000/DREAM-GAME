using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Data.SqlClient;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using MySql.Data.MySqlClient;

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

        private void buttonBuscar_Click(object sender, EventArgs e)
        {

            string connectionString = "Server=localhost; Port=3306; Database=db_dreamgame; Uid=root; Pwd=;";

            string query = "SELECT titulo, valor, ano, desenvolvedor, genero, descricao, tamanho, avaliacao " +
                           "FROM tb_produtos WHERE titulo LIKE @Titulo";

            using (MySqlConnection connection = new MySqlConnection(connectionString)) // Use MySqlConnection
            {
                using (MySqlCommand command = new MySqlCommand(query, connection)) // Use MySqlCommand
                {
                    command.Parameters.AddWithValue("@Titulo", "%" + textBoxTitulo.Text + "%");

                    try
                    {
                        connection.Open();
                        MySqlDataReader reader = command.ExecuteReader(); // Use MySqlDataReader

                        if (reader.Read())
                        {

                            textBoxTitulo.Text = reader["titulo"].ToString();
                            textBoxAno.Text = reader["ano"].ToString();
                            textBoxValor.Text = reader["valor"].ToString();
                            textBoxDesenvolvedor.Text = reader["desenvolvedor"].ToString();
                            textBoxTamanho.Text = reader["tamanho"].ToString();
                            textBoxAvaliacao.Text = reader["avaliacao"].ToString();
                            textBoxGenero.Text = reader["genero"].ToString();
                            richTextBoxDescricao.Text = reader["descricao"].ToString();
                        }
                        else
                        {
                            MessageBox.Show("Produto não encontrado.");
                        }
                    }
                    catch (Exception ex)
                    {
                        MessageBox.Show("Erro: " + ex.Message);
                    }
                }
            }
        }

        private void buttonEditarproduto_Click(object sender, EventArgs e)
        {
            string connectionString = "Server=localhost; Port=3306; Database=db_dreamgame; Uid=root; Pwd=;";

            string query = "UPDATE tb_produtos SET valor = @Valor, ano = @Ano, desenvolvedor = @Desenvolvedor, " +
                           "genero = @Genero, descricao = @Descricao, tamanho = @Tamanho, avaliacao = @Avaliacao " +
                           "WHERE titulo = @Titulo";

            using (MySqlConnection connection = new MySqlConnection(connectionString))
            {
                using (MySqlCommand command = new MySqlCommand(query, connection))
                {

                    command.Parameters.AddWithValue("@Titulo", textBoxTitulo.Text);
                    command.Parameters.AddWithValue("@Valor", textBoxValor.Text);
                    command.Parameters.AddWithValue("@Ano", textBoxAno.Text);
                    command.Parameters.AddWithValue("@Desenvolvedor", textBoxDesenvolvedor.Text);
                    command.Parameters.AddWithValue("@Genero", textBoxGenero.Text);
                    command.Parameters.AddWithValue("@Descricao", richTextBoxDescricao.Text);
                    command.Parameters.AddWithValue("@Tamanho", textBoxTamanho.Text);
                    command.Parameters.AddWithValue("@Avaliacao", textBoxAvaliacao.Text);

                    try
                    {
                        connection.Open();
                        int rowsAffected = command.ExecuteNonQuery();

                        if (rowsAffected > 0)
                        {
                            MessageBox.Show("Produto atualizado com sucesso!");
                        }
                        else
                        {
                            MessageBox.Show("Nenhuma alteração foi feita ou produto não encontrado.");
                        }
                    }
                    catch (Exception ex)
                    {
                        MessageBox.Show("Erro: " + ex.Message);
                    }

                    textBoxTitulo.Text = "";
                    textBoxValor.Text = "";
                    textBoxAno.Text = "";
                    textBoxDesenvolvedor.Text = "";
                    textBoxGenero.Text = "";
                    richTextBoxDescricao.Text = "";
                    textBoxTamanho.Text = "";
                    textBoxAvaliacao.Focus();

                }
            }
        }
    }
}

