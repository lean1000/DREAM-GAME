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

        private void textBox4_TextChanged(object sender, EventArgs e)
        {

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

        }
    }
    
