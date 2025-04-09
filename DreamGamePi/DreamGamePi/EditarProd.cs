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

        

        


        private void buttonEditarproduto_Click(object sender, EventArgs e)
        {
            string conexaoString = "Server=185.213.81.205;Port=3306;Database=u336727971_db_dreamgame;Uid=u336727971_hostinger;Pwd=DreamGame@1;";
            string query = "UPDATE tb_produtos SET valor = @Valor, imagen = @Imagen, ano = @Ano, desenvolvedor = @Desenvolvedor, " +
                           "ID_genero = @ID_genero, descricao = @Descricao,  avaliacao = @Avaliacao " +
                           "WHERE titulo = @Titulo";

            using (MySqlConnection connection = new MySqlConnection(conexaoString))
            {
                using (MySqlCommand command = new MySqlCommand(query, connection))
                {

                    command.Parameters.AddWithValue("@Titulo", textBoxTitulo.Text);
                    command.Parameters.AddWithValue("@Valor", textBoxValor.Text);
                    command.Parameters.AddWithValue("@Ano", textBoxAno.Text);
                    command.Parameters.AddWithValue("@Desenvolvedor", textBoxDesenvolvedor.Text);                   
                    command.Parameters.AddWithValue("@Descricao", richTextBoxDescricao.Text);
                    command.Parameters.AddWithValue("@Imagen", textBoxImagem.Text);
                    command.Parameters.AddWithValue("@Avaliacao", textBoxAvaliacao.Text);
                    command.Parameters.AddWithValue("@ID_genero", textBoxGenero.Text);

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
                    textBoxImagem.Text = "";
                    textBoxAvaliacao.Focus();

                }
            }
        }

        private void buttonBuscar_Click(object sender, EventArgs e)
        {

            string conexaoString = "Server=185.213.81.205;Port=3306;Database=u336727971_db_dreamgame;Uid=u336727971_hostinger;Pwd=DreamGame@1;";
            string query = @"SELECT titulo, imagen, valor, ano, desenvolvedor, descricao, avaliacao, ID_genero 
                     FROM tb_produtos 
                     WHERE titulo LIKE @Titulo 
                     LIMIT 1"; 

            using (MySqlConnection connection = new MySqlConnection(conexaoString))
            {
                using (MySqlCommand command = new MySqlCommand(query, connection))
                {
                    command.Parameters.AddWithValue("@Titulo", "%" + textBoxBusca.Text + "%");

                    try
                    {
                        connection.Open();
                        MySqlDataReader reader = command.ExecuteReader();

                        if (reader.Read())
                        {
                            textBoxTitulo.Text = reader["titulo"].ToString();
                            textBoxImagem.Text = reader["imagen"].ToString(); 
                            textBoxValor.Text = reader["valor"].ToString();
                            textBoxAno.Text = reader["ano"].ToString();
                            textBoxDesenvolvedor.Text = reader["desenvolvedor"].ToString();
                            richTextBoxDescricao.Text = reader["descricao"].ToString();
                            textBoxAvaliacao.Text = reader["avaliacao"].ToString();
                            textBoxGenero.Text = reader["ID_genero"].ToString();
                        }
                        else
                        {
                            
                            textBoxTitulo.Clear();
                            textBoxImagem.Clear();
                            textBoxValor.Clear();
                            textBoxAno.Clear();
                            textBoxDesenvolvedor.Clear();
                            richTextBoxDescricao.Clear();
                            textBoxAvaliacao.Clear();
                            textBoxGenero.Clear();
                        }
                    }
                    catch (Exception ex)
                    {
                        MessageBox.Show("Erro: " + ex.Message);
                    }
                }
            }
        }

        private void buttonEditar_Click(object sender, EventArgs e)
        {
            EditarUsuarios form = new EditarUsuarios();
            form.ShowDialog();
        }

        private void buttonProdutos_Click(object sender, EventArgs e)
        {
            EditarProd form = new EditarProd();
            form.ShowDialog();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            Menu form = new Menu();
            form.ShowDialog();
        }

        private void buttonVoltar_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void textBoxAvaliacao_TextChanged(object sender, EventArgs e)
        {

        }
    }
    
}

