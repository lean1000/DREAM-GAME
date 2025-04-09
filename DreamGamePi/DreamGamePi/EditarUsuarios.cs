using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using MySql.Data.MySqlClient;


namespace DreamGamePi
{
    public partial class EditarUsuarios : Form
    {
        public EditarUsuarios()
        {
            InitializeComponent();
        }

        private void buttonProdutos_Click(object sender, EventArgs e)
        {
            EditarProd form = new EditarProd();
            form.ShowDialog();
        }

        private void buttonEditar_Click(object sender, EventArgs e)
        {
            // Aqui vai a lógica para editar usuários (se quiser depois eu te ajudo com isso também)
        }


        
                          

        private void buttonBuscar_Click_1(object sender, EventArgs e)
        {
            string conexaoString = "Server=185.213.81.205;Port=3306;Database=u336727971_db_dreamgame;Uid=u336727971_hostinger;Pwd=DreamGame@1;";
            string query = @"SELECT u.ID_users, u.apelido, u.nome, u.nascimento,
                     i.email, i.senha
              FROM tb_users u
              JOIN tb_info_users i ON u.ID_users = i.ID_users
              WHERE u.nome LIKE @Nome
              LIMIT 1"; // Pega só o primeiro encontrado

            using (MySqlConnection connection = new MySqlConnection(conexaoString))
            {
                using (MySqlCommand command = new MySqlCommand(query, connection))
                {
                    command.Parameters.AddWithValue("@Nome", "%" + textBoxBusca.Text + "%");

                    try
                    {
                        connection.Open();
                        MySqlDataReader reader = command.ExecuteReader();

                        if (reader.Read())
                        {
                            textBoxNome.Text = reader["nome"].ToString();
                            textBoxEmail.Text = reader["email"].ToString();
                            textBoxSenha.Text = reader["senha"].ToString();
                            textBoxApelido.Text = reader["apelido"].ToString();
                            textBoxDataNascimento.Text = Convert.ToDateTime(reader["nascimento"]).ToString("yyyy-MM-dd");
                        }
                        else
                        {
                            // Limpa os campos se não encontrar
                            textBoxNome.Clear();
                            textBoxEmail.Clear();
                            textBoxSenha.Clear();
                            textBoxApelido.Clear();
                            textBoxDataNascimento.Clear();
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
           
        
            string connectionString = "Server=185.213.81.205; Port=3306; Database=u336727971_db_dreamgame; Uid=u336727971_hostinger; Pwd=DreamGame@1;";

            // Verifique se o nome foi preenchido
            if (string.IsNullOrWhiteSpace(textBoxNome.Text))
            {
                MessageBox.Show("Busque um usuário antes de editar.");
                return;
            }

            string query = @"UPDATE tb_users u
                     JOIN tb_info_users i ON u.ID_users = i.ID_users
                     SET u.apelido = @Apelido,
                         u.nome = @Nome,
                         u.nascimento = @Nascimento,
                         i.email = @Email,
                         i.senha = @Senha
                     WHERE u.nome LIKE @NomeBusca
                     LIMIT 1";

            using (MySqlConnection connection = new MySqlConnection(connectionString))
            {
                using (MySqlCommand command = new MySqlCommand(query, connection))
                {
                    // Parâmetros para atualização
                    command.Parameters.AddWithValue("@Apelido", textBoxApelido.Text);
                    command.Parameters.AddWithValue("@Nome", textBoxNome.Text);
                    command.Parameters.AddWithValue("@Nascimento", DateTime.Parse(textBoxDataNascimento.Text));
                    command.Parameters.AddWithValue("@Email", textBoxEmail.Text);
                    command.Parameters.AddWithValue("@Senha", textBoxSenha.Text); 
                    command.Parameters.AddWithValue("@NomeBusca", "%" + textBoxBusca.Text + "%"); 

                    try
                    {
                        connection.Open();
                        int rowsAffected = command.ExecuteNonQuery();

                        if (rowsAffected > 0)
                        {
                            MessageBox.Show("Dados atualizados com sucesso!");
                        }
                        else
                        {
                            MessageBox.Show("Nenhum usuário foi atualizado.");
                        }
                    }
                    catch (Exception ex)
                    {
                        MessageBox.Show("Erro: " + ex.Message);
                    }
                }
            }
        }

        private void buttonVoltar_Click(object sender, EventArgs e)
        {
            this.Close();
        }
    }
}



