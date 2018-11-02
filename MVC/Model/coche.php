<?php
class Coche
{
	private $pdo;

    public $id;
    public $marca;
    public $modelo;
    public $anio;
    public $kilometraje;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM autos");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id)
	{
		try
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM autos WHERE auto_id = ?");


			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM autos WHERE auto_id = ?");

			$stm->execute(array($id));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE autos SET
						make            = ?,
						model           = ?,
            year            = ?,
						mileage         = ?,
				    WHERE auto_id   = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                  $data->marca,
									$data->modelo,
                  $data->anio,
                  $data->kilometraje,
                  $data->id
								)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Coche $data)
	{
		try
		{
		$sql = "INSERT INTO autos (make,model,year,mileage)
		        VALUES (?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
							$data->marca,
							$data->modelo,
							$data->anio,
							$data->kilometraje
						)
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}
?>
