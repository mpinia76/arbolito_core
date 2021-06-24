<?php
namespace Arbolito\Core\service;

/**
 * Factory de servicios
 *
 *
 * @author Marcos
 * @since 27-02-2018
 *
 */

use Arbolito\Core\service\impl\MovimientoCuentaServiceImpl;
use Arbolito\Core\service\impl\MovimientoTransferenciaServiceImpl;
use Arbolito\Core\service\impl\PaisServiceImpl;
use Arbolito\Core\service\impl\MarcaProductoServiceImpl;
use Arbolito\Core\service\impl\IvaServiceImpl;
use Arbolito\Core\service\impl\TipoProductoServiceImpl;
use Arbolito\Core\service\impl\TipoClienteServiceImpl;

use Arbolito\Core\service\impl\ConceptoGastoServiceImpl;
use Arbolito\Core\service\impl\ConceptoMovimientoServiceImpl;
use Arbolito\Core\service\impl\ProvinciaServiceImpl;
use Arbolito\Core\service\impl\LocalidadServiceImpl;
use Arbolito\Core\service\impl\ClienteServiceImpl;
use Arbolito\Core\service\impl\ProveedorServiceImpl;


use Arbolito\Core\service\impl\ProductoServiceImpl;

use Arbolito\Core\service\impl\AnulacionServiceImpl;
use Arbolito\Core\service\impl\CuentaServiceImpl;
use Arbolito\Core\service\impl\GastoServiceImpl;

use Arbolito\Core\service\impl\MovimientoGastoServiceImpl;
use Arbolito\Core\service\impl\TransferenciaServiceImpl;
use Arbolito\Core\service\impl\VentaServiceImpl;
use Arbolito\Core\service\impl\MovimientoVentaServiceImpl;
use Arbolito\Core\service\impl\MovimientoCajaServiceImpl;
use Arbolito\Core\service\impl\CuentaCorrienteServiceImpl;
use Arbolito\Core\service\impl\BancoServiceImpl;
use Arbolito\Core\service\impl\CajaServiceImpl;
use Arbolito\Core\service\impl\PagoServiceImpl;
use Arbolito\Core\service\impl\MovimientoPagoServiceImpl;
use Arbolito\Core\service\impl\TarjetaServiceImpl;

use Arbolito\Core\service\impl\ParametroServiceImpl;

use Arbolito\Core\service\impl\PresupuestoServiceImpl;

use Arbolito\Core\service\impl\ComboServiceImpl;

use Arbolito\Core\service\impl\ActualizacionServiceImpl;

use Arbolito\Core\service\impl\MovimientoActualizacionServiceImpl;

use Arbolito\Core\service\impl\PedidoServiceImpl;

use Arbolito\Core\service\impl\MovimientoPedidoServiceImpl;

class ServiceFactory {








	/**
	 * Service para Pais.
	 *
	 * @return IPaisService
	 */
	public static function getPaisService(){

		return new PaisServiceImpl();
	}

	/**
	 * Service para MarcaProducto.
	 *
	 * @return IMarcaProductoService
	 */
	public static function getMarcaProductoService(){

		return new MarcaProductoServiceImpl();
	}

	/**
	 * Service para Iva.
	 *
	 * @return IIvaService
	 */
	public static function getIvaService(){

		return new IvaServiceImpl();
	}

	/**
	 * Service para TipoProducto.
	 *
	 * @return ITipoProductoService
	 */
	public static function getTipoProductoService(){

		return new TipoProductoServiceImpl();
	}

    /**
     * Service para TipoCliente.
     *
     * @return ITipoClienteService
     */
    public static function getTipoClienteService(){

        return new TipoClienteServiceImpl();
    }




	/**
	 * Service para ConceptoGasto.
	 *
	 * @return IConceptoGastoService
	 */
	public static function getConceptoGastoService(){

		return new ConceptoGastoServiceImpl();
	}

	/**
	 * Service para ConceptoMovimiento.
	 *
	 * @return IConceptoMovimientoService
	 */
	public static function getConceptoMovimientoService(){

		return new ConceptoMovimientoServiceImpl();
	}


	/**
	 * Service para Provincia.
	 *
	 * @return IProvinciaService
	 */
	public static function getProvinciaService(){

		return new ProvinciaServiceImpl();
	}

	/**
	 * Service para Localidad.
	 *
	 * @return ILocalidadService
	 */
	public static function getLocalidadService(){

		return new LocalidadServiceImpl();
	}

	/**
	 * Service para Cliente.
	 *
	 * @return IClienteService
	 */
	public static function getClienteService(){

		return new ClienteServiceImpl();
	}

	/**
	 * Service para Proveedor.
	 *
	 * @return IProveedorService
	 */
	public static function getProveedorService(){

		return new ProveedorServiceImpl();
	}

	/**
	 * Service para Pedido.
	 *
	 * @return IPedidoService
	 */
	public static function getPedidoService(){

		return new PedidoServiceImpl();
	}



	/**
	 * Service para Producto.
	 *
	 * @return IProductoService
	 */
	public static function getProductoService(){

		return new ProductoServiceImpl();
	}



	/**
	 * Service para Anulacion.
	 *
	 * @return IAnulacionService
	 */
	public static function getAnulacionService(){

		return new AnulacionServiceImpl();
	}

	/**
	 * Service para Cuenta.
	 *
	 * @return ICuentaService
	 */
	public static function getCuentaService(){

		return new CuentaServiceImpl();
	}

	/**
	 * Service para Gasto.
	 *
	 * @return IGastoService
	 */
	public static function getGastoService(){

		return new GastoServiceImpl();
	}

	/**
	 * Service para MovimientoGasto.
	 *
	 * @return IMovimientoCuentaService
	 */
	public static function getMovimientoGastoService(){

		return new MovimientoGastoServiceImpl();
	}

	/**
	 * Service para Venta.
	 *
	 * @return IMovimientoCuentaService
	 */
	public static function getVentaService(){

		return new VentaServiceImpl();
	}

	/**
	 * Service para MovimientoVenta.
	 *
	 * @return IMovimientoCuentaService
	 */
	public static function getMovimientoVentaService(){

		return new MovimientoVentaServiceImpl();
	}

	/**
	 * Service para MovimientoCaja.
	 *
	 * @return IMovimientoCuentaService
	 */
	public static function getMovimientoCajaService(){

		return new MovimientoCajaServiceImpl();
	}

	/**
	 * Service para CuentaCorriente.
	 *
	 * @return IMovimientoCuentaService
	 */
	public static function getCuentaCorrienteService(){

		return new CuentaCorrienteServiceImpl();
	}

	/**
	 * Service para Banco.
	 *
	 * @return IMovimientoCuentaService
	 */
	public static function getBancoService(){

		return new BancoServiceImpl();
	}

	/**
	 * Service para Caja.
	 *
	 * @return IMovimientoCuentaService
	 */
	public static function getCajaService(){

		return new CajaServiceImpl();
	}

	/**
	 * Service para Pago.
	 *
	 * @return IMovimientoCuentaService
	 */
	public static function getPagoService(){

		return new PagoServiceImpl();
	}

	/**
	 * Service para MovimientoPago.
	 *
	 * @return IMovimientoPagoService
	 */
	public static function getMovimientoPagoService(){

		return new MovimientoPagoServiceImpl();
	}

	/**
	 * Service para Tarjeta.
	 *
	 * @return ITarjetaService
	 */
	public static function getTarjetaService(){

		return new TarjetaServiceImpl();
	}



	/**
	 * Service para Parametro.
	 *
	 * @return IParametroService
	 */
	public static function getParametroService(){

		return new ParametroServiceImpl();
	}


	/**
	 * Service para Presupuesto.
	 *
	 * @return IPresupuestoService
	 */
	public static function getPresupuestoService(){

		return new PresupuestoServiceImpl();
	}

	/**
	 * Service para Combo.
	 *
	 * @return IComboService
	 */
	public static function getComboService(){

		return new ComboServiceImpl();
	}

	/**
	 * Service para Actualizacion.
	 *
	 * @return IActualizacionService
	 */
	public static function getActualizacionService(){

		return new ActualizacionServiceImpl();
	}


	/**
	 * Service para MovimientoActualizacion.
	 *
	 * @return IMovimientoActualizacionService
	 */
	public static function getMovimientoActualizacionService(){

		return new MovimientoActualizacionServiceImpl();
	}

	/**
	 * Service para MovimientoPedido.
	 *
	 * @return IMovimientoPedidoService
	 */
	public static function getMovimientoPedidoService(){

		return new MovimientoPedidoServiceImpl();
	}

    /**
     * Service para MovimientoCuenta.
     *
     * @return IMovimientoCuentaService
     */
    public static function getMovimientoCuentaService(){

        return new MovimientoCuentaServiceImpl();
    }

    /**
     * Service para Transferencia.
     *
     * @return ITransferenciaService
     */
    public static function getTransferenciaService(){

        return new TransferenciaServiceImpl();
    }

    /**
     * Service para MovimientoTransferencia.
     *
     * @return IMovimientoTransferenciaService
     */
    public static function getMovimientoTransferenciaService(){

        return new MovimientoTransferenciaServiceImpl();
    }
}
