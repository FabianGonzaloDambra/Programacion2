-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2023 a las 22:44:31
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vazquez`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `clienteId` int(10) NOT NULL COMMENT 'Idenfiticador único de clientes',
  `clienteNombre` varchar(200) NOT NULL COMMENT 'Nombre/s del cliente',
  `clienteApellido` varchar(200) NOT NULL COMMENT 'Apellido/o del cliente',
  `clienteDni` int(8) NOT NULL COMMENT 'DNI del cliente',
  `clienteTelefono` varchar(15) DEFAULT NULL COMMENT 'Teléfono de contacto del cliente',
  `clienteMail` varchar(500) DEFAULT NULL COMMENT 'Correo electrónico del cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`clienteId`, `clienteNombre`, `clienteApellido`, `clienteDni`, `clienteTelefono`, `clienteMail`) VALUES
(1, 'Pepe', 'Perez', 5632569, '3704546152', 'pepe@hotmail.com'),
(7, 'Moncho', 'Gomez', 12341341, '3704967710', 'moncho@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_direcciones`
--

CREATE TABLE `cliente_direcciones` (
  `clienteId` int(10) NOT NULL COMMENT 'ID de relaciones de clientes y direcciones',
  `direccionId` int(10) NOT NULL COMMENT 'ID de relación de direcciones'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE `direcciones` (
  `direccionId` int(10) NOT NULL COMMENT 'Identificador único de la dirección del domicilio del cliente',
  `direccionPais` varchar(250) NOT NULL COMMENT 'País de residencia del cliente',
  `direccionProvincia` varchar(100) NOT NULL COMMENT 'Provincia de residencia del cliente',
  `direccionCiudad` varchar(250) NOT NULL COMMENT 'Ciudad/localidad del domicilio del cliente',
  `direccionCodigopostal` int(10) DEFAULT NULL COMMENT 'Código postal del domicilio del cliente',
  `direccionBarrio` varchar(250) DEFAULT NULL COMMENT 'Barrio del domicilio del cliente',
  `direccionCallenombre` varchar(250) DEFAULT NULL COMMENT 'Nombre de la calle del domicilio del cliente',
  `direccionCallenumero` int(10) DEFAULT NULL COMMENT 'Numeración de la calle del domicilio del cliente',
  `direccionDeptonumero` int(10) DEFAULT NULL COMMENT 'Número del departamento del domicilio del cliente',
  `direccionDetalles` text DEFAULT NULL COMMENT 'Campo para agregar detalles que ayuden a localizar el domicilio del cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `direcciones`
--

INSERT INTO `direcciones` (`direccionId`, `direccionPais`, `direccionProvincia`, `direccionCiudad`, `direccionCodigopostal`, `direccionBarrio`, `direccionCallenombre`, `direccionCallenumero`, `direccionDeptonumero`, `direccionDetalles`) VALUES
(1, 'Argentina', 'Formosa', 'Formosa', 3600, 'Mariano Moreno', 'Salta', 3000, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `empleadoId` int(10) NOT NULL COMMENT 'Identificador único del empleado',
  `empleadoNombre` varchar(200) NOT NULL COMMENT 'Nombre/s del empleado',
  `empleadoApellido` varchar(200) NOT NULL COMMENT 'Apellido/s del empleado',
  `empleadoDni` int(8) NOT NULL COMMENT 'DNI del empleado',
  `empleado_direccion` int(10) NOT NULL COMMENT 'Dirección del empleado',
  `empleadoTelefono` varchar(20) NOT NULL COMMENT 'Teléfono de contacto del empleado',
  `empleadoMail` varchar(500) DEFAULT NULL COMMENT 'Correo electrónico del empleado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mecanicos`
--

CREATE TABLE `mecanicos` (
  `mecanicoId` int(10) NOT NULL COMMENT 'Identificador único del especialista/mecánico externo a la empresa',
  `mecanicoNombre` varchar(200) NOT NULL COMMENT 'Nombre/s del especialista/mecánico externo a la empresa',
  `mecanicoApellido` varchar(200) NOT NULL COMMENT 'Apellido/s del especialista/mecánico externo a la empresa',
  `mecanicoEspecialidad` varchar(200) NOT NULL COMMENT 'Especialidad u oficio del especialista/mecánico externo a la empresa',
  `mecanico_direccion` int(10) NOT NULL COMMENT 'Dirección del especialista/mecánico externo a la empresa',
  `mecanicoTelefono` varchar(15) DEFAULT NULL COMMENT 'Teléfono de contacto del especialista/mecánico externo a la empresa',
  `mecanicoMail` varchar(500) DEFAULT NULL COMMENT 'Correo electrónico del especialista/mecánico externo a la empresa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuarioId` int(10) NOT NULL,
  `usuarioNombre` varchar(200) NOT NULL,
  `usuarioPass` varchar(20) NOT NULL,
  `usuarioEmail` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuarioId`, `usuarioNombre`, `usuarioPass`, `usuarioEmail`) VALUES
(1, 'a', 'a', 'a@a.com'),
(2, 'b', 'b', 'b@b.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `vehiculoId` int(10) NOT NULL COMMENT 'Identificador único de los vehículos/automóviles',
  `vehiculoMarca` varchar(200) NOT NULL COMMENT 'Marca del vehículo',
  `vehiculoModelo` varchar(200) NOT NULL COMMENT 'Modelo del vehículo',
  `vehiculoAniomodelo` int(4) NOT NULL COMMENT 'Año de fabricación del vehículo',
  `vehiculoColor` varchar(500) NOT NULL COMMENT 'Color del vehículo',
  `vehiculoTipo` varchar(200) NOT NULL COMMENT 'Clasificación del vehículo (automóvil, camioneta, SUV, etc)',
  `vehiculoPatente` varchar(20) NOT NULL COMMENT 'Patente del vehículo',
  `vehiculoNombretitulo` varchar(500) DEFAULT NULL COMMENT 'Nombre de la persona con que se encuentra registrado el vehículo según el título de propiedad',
  `vehiculoCostocompra` decimal(30,2) NOT NULL COMMENT 'Precio pagado por la empresa para adquirir el vehículo',
  `vehiculoFechacompra` date NOT NULL COMMENT 'Fecha en que la empresa concretó la compra del vehículo',
  `vehiculoKmingreso` decimal(8,1) NOT NULL COMMENT 'Kilometraje con el que ingresa el vehículo a la empresa',
  `vehiculoCambioaceite` date DEFAULT NULL COMMENT 'Fecha del último cambio de aceite (nulo en caso que no se haya realizado el cambio)',
  `vehiculoCambiocorrea` date DEFAULT NULL COMMENT 'Fecha del último cambio de correa de distribución (nulo en caso que no se haya realizado el cambio)',
  `vehiculoDetalles` text DEFAULT NULL COMMENT 'Campo para agregar los detalles que requiera el usuario y no esten contemplados en los demás atributos',
  `vehiculoCostosreparaciones` decimal(30,2) DEFAULT NULL COMMENT 'Costos acumulados de las reparaciones y/o servicios realizados al vehículo',
  `vehiculoMecanico` int(10) DEFAULT NULL COMMENT 'Clave foránea que relaciona a un mecánico ajeno a la empresa que haya trabajado en el vehículo',
  `vehiculoIdventa` int(10) DEFAULT NULL COMMENT 'Clave foránea que vincula la operación de venta del vehículo',
  `vehiculoKmsalida` decimal(8,1) DEFAULT NULL COMMENT 'Kilometraje actual del vehículo o previo a su entrega a un comprador',
  `vehiculoIdvendedor` int(10) DEFAULT NULL COMMENT 'Clave foránea que vincula a una persona como vendedora del vehículo a la empresa',
  `vehiculoIdcomprador` int(10) DEFAULT NULL COMMENT 'Clave foránea que vincula el cliente que compra el vehículo a la empresa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `ventaId` int(10) NOT NULL COMMENT 'Identificador único de la operación de venta',
  `vehiculoId` int(10) NOT NULL COMMENT 'Clave foránea que vincula un vehículo a una operación de venta',
  `ventaPrecio` decimal(30,2) NOT NULL COMMENT 'Precio obtenido de la operación de venta',
  `empleadoId` int(10) NOT NULL COMMENT 'Clave foránea que vincula al empleado que concretó la operación de venta',
  `ventaFecha` date NOT NULL COMMENT 'Fecha en la que se concretó la operación de venta',
  `clienteId` int(10) NOT NULL COMMENT 'Clave foránea que vincula al cliente con la operación de venta'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`clienteId`),
  ADD UNIQUE KEY `DNI` (`clienteDni`);

--
-- Indices de la tabla `cliente_direcciones`
--
ALTER TABLE `cliente_direcciones`
  ADD PRIMARY KEY (`clienteId`,`direccionId`),
  ADD KEY `cliente_id` (`clienteId`),
  ADD KEY `cliente_id_2` (`clienteId`),
  ADD KEY `direccionId` (`direccionId`);

--
-- Indices de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD PRIMARY KEY (`direccionId`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`empleadoId`),
  ADD UNIQUE KEY `DNI EMPLEADO` (`empleadoDni`),
  ADD KEY `DIRECCION EMPLEADO` (`empleado_direccion`);
ALTER TABLE `empleados` ADD FULLTEXT KEY `NOMBRE EMPLEADOS` (`empleadoNombre`);
ALTER TABLE `empleados` ADD FULLTEXT KEY `APELLIDO EMPLEADO` (`empleadoApellido`);

--
-- Indices de la tabla `mecanicos`
--
ALTER TABLE `mecanicos`
  ADD PRIMARY KEY (`mecanicoId`),
  ADD KEY `mecanico_direccion` (`mecanico_direccion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuarioId`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`vehiculoId`),
  ADD UNIQUE KEY `PATENTE` (`vehiculoPatente`),
  ADD KEY `vehiculo_idvendedor` (`vehiculoIdvendedor`),
  ADD KEY `vehiculo_mecanico` (`vehiculoMecanico`),
  ADD KEY `vehiculo_marca` (`vehiculoMarca`),
  ADD KEY `vehiculo_modelo` (`vehiculoModelo`),
  ADD KEY `vehiculoIdcomprador` (`vehiculoIdcomprador`) USING BTREE,
  ADD KEY `vehiculoIdventa` (`vehiculoIdventa`);
ALTER TABLE `vehiculos` ADD FULLTEXT KEY `TIPO VEHICULO` (`vehiculoTipo`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`ventaId`),
  ADD UNIQUE KEY `vehiculo_id` (`vehiculoId`),
  ADD UNIQUE KEY `EMPLEADO ID` (`empleadoId`),
  ADD KEY `cliente_id` (`clienteId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `clienteId` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Idenfiticador único de clientes', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  MODIFY `direccionId` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Identificador único de la dirección del domicilio del cliente', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `empleadoId` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Identificador único del empleado', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `mecanicos`
--
ALTER TABLE `mecanicos`
  MODIFY `mecanicoId` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Identificador único del especialista/mecánico externo a la empresa', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuarioId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `vehiculoId` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Identificador único de los vehículos/automóviles', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `ventaId` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Identificador único de la operación de venta', AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente_direcciones`
--
ALTER TABLE `cliente_direcciones`
  ADD CONSTRAINT `cliente_direcciones_ibfk_1` FOREIGN KEY (`clienteId`) REFERENCES `clientes` (`clienteId`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `cliente_direcciones_ibfk_2` FOREIGN KEY (`direccionId`) REFERENCES `direcciones` (`direccionId`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`empleado_direccion`) REFERENCES `direcciones` (`direccionId`);

--
-- Filtros para la tabla `mecanicos`
--
ALTER TABLE `mecanicos`
  ADD CONSTRAINT `mecanicos_ibfk_1` FOREIGN KEY (`mecanico_direccion`) REFERENCES `direcciones` (`direccionId`);

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`vehiculoIdcomprador`) REFERENCES `clientes` (`clienteId`),
  ADD CONSTRAINT `vehiculos_ibfk_2` FOREIGN KEY (`vehiculoIdvendedor`) REFERENCES `clientes` (`clienteId`),
  ADD CONSTRAINT `vehiculos_ibfk_3` FOREIGN KEY (`vehiculoMecanico`) REFERENCES `mecanicos` (`mecanicoId`),
  ADD CONSTRAINT `vehiculos_ibfk_4` FOREIGN KEY (`vehiculoIdventa`) REFERENCES `ventas` (`ventaId`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`empleadoId`) REFERENCES `empleados` (`empleadoId`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`vehiculoId`) REFERENCES `vehiculos` (`vehiculoId`),
  ADD CONSTRAINT `ventas_ibfk_3` FOREIGN KEY (`clienteId`) REFERENCES `clientes` (`clienteId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
