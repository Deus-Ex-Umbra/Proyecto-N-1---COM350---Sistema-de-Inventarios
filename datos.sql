-- Agregar proveedores reales de Bolivia
INSERT INTO SUPPLIER (NAMESUP) VALUES 
('Bagó'), 
('Droguería INTI S.A.'), 
('Multipharma Representaciones SRL'), 
('Laboratorios COFAR'), 
('Laboratorios Vita'), 
('Droguería Farmacorp'), 
('Farmacias Chávez'), 
('Laboratorios Alfa');

-- Agregar marcas
INSERT INTO BRAND (NAMEBRAND) VALUES 
('Panadol'), 
('Nurofen'), 
('Cebion'), 
('Braun'), 
('Nivea'), 
('Clamoxyl'), 
('Bayer'), 
('Centrum');

-- Agregar categorías
INSERT INTO CATEGORY (NAMECAT) VALUES 
('Medicamentos'), 
('Suplementos'), 
('Equipos Médicos'), 
('Cosméticos'), 
('Vitaminas');

-- Agregar inventarios
INSERT INTO INVENTORY (NAMEINV, DESCRIPTIONINV, UBICATIONINV) VALUES 
('Inventario Principal', 'Inventario de la farmacia principal', 'Sucre - Bolivia'),
('Inventario Secundario', 'Inventario de la sucursal', 'Sucre - Bolivia'),
('Inventario de Emergencia', 'Inventario para emergencias', 'Sucre - Bolivia');

-- Agregar productos al inventario
INSERT INTO PRODUCT (NAMEEPROD, DESCRIPTIONPROD, TOTALAMOUNT, TOTALVALUE, PHOTOPROD, CODINV, CODCAT, CODSUP, CODEBRAND) VALUES 
('Paracetamol', 'Analgésico y antipirético', 100, 500.0, 'paracetamol.png', 1, 1, 1, 1),
('Ibuprofeno', 'Antiinflamatorio no esteroideo', 150, 750.0, 'ibuprofeno.png', 1, 1, 2, 2),
('Vitamina C', 'Suplemento vitamínico', 200, 300.0, 'vitamina_c.png', 2, 5, 3, 3),
('Termómetro Digital', 'Equipo para medir la temperatura', 50, 1000.0, 'termometro.png', 3, 3, 4, 4),
('Crema Hidratante', 'Cosmético para la piel', 80, 400.0, 'crema.png', 1, 4, 1, 5),
('Antibiótico', 'Medicamento para infecciones', 120, 600.0, 'antibiotico.png', 1, 1, 2, 6),
('Aspirina', 'Analgésico y antiinflamatorio', 90, 450.0, 'aspirina.png', 1, 1, 1, 7),
('Multivitamínico', 'Suplemento vitamínico', 180, 540.0, 'multivitaminico.png', 2, 5, 3, 8),
('Guantes Quirúrgicos', 'Equipo médico desechable', 200, 800.0, 'guantes.png', 3, 3, 4, 4),
('Jabón Antibacterial', 'Cosmético para higiene', 100, 300.0, 'jabon.png', 1, 4, 1, 5),
('Omeprazol', 'Inhibidor de la bomba de protones', 130, 650.0, 'omeprazol.png', 2, 1, 2, 6),
('Amoxicilina', 'Antibiótico de amplio espectro', 110, 550.0, 'amoxicilina.png', 3, 1, 3, 6),
('Gasa Estéril', 'Gasa para uso médico', 200, 600.0, 'gasa.png', 3, 3, 4, 2),
('Jarabe para la Tos', 'Medicamento para aliviar la tos', 150, 450.0, 'jarabe.png', 2, 1, 3, 3);

-- Agregar ítems para cada producto existente, incluyendo los dos nuevos productos
INSERT INTO ITEM (LOTNUMBER, DESCRIPTIONITEM, OBSERVATION, DATEENTRY, DATEEXPIRATION, TOTALAMOUNT, TOTALVALUE, UNITPRICE, CODPROD) VALUES 
(101, 'Lote 101 de Paracetamol', 'Sin observaciones', '2024-08-01', '2025-08-01', 50, 250.0, 5.0, 1),
(102, 'Lote 102 de Paracetamol', 'Sin observaciones', '2024-08-01', '2025-08-01', 50, 250.0, 5.0, 1),
(103, 'Lote 103 de Paracetamol', 'Producto vencido', '2022-08-01', '2023-08-01', 50, 250.0, 5.0, 1),
(201, 'Lote 201 de Ibuprofeno', 'Sin observaciones', '2024-08-01', '2025-08-01', 75, 375.0, 5.0, 2),
(202, 'Lote 202 de Ibuprofeno', 'Sin observaciones', '2024-08-01', '2025-08-01', 75, 375.0, 5.0, 2),
(203, 'Lote 203 de Ibuprofeno', 'Producto vencido', '2022-08-01', '2023-08-01', 75, 375.0, 5.0, 2),
(301, 'Lote 301 de Vitamina C', 'Sin observaciones', '2024-08-01', '2025-08-01', 100, 150.0, 1.5, 3),
(302, 'Lote 302 de Vitamina C', 'Sin observaciones', '2024-08-01', '2025-08-01', 100, 150.0, 1.5, 3),
(303, 'Lote 303 de Vitamina C', 'Producto vencido', '2022-08-01', '2023-08-01', 100, 150.0, 1.5, 3),
(304, 'Lote 304 de Vitamina C', 'Producto cercano a vencerse', '2023-08-01', '2024-08-01', 100, 150.0, 1.5, 3),
(401, 'Lote 401 de Termómetro Digital', 'Sin observaciones', '2024-08-01', '2025-08-01', 25, 500.0, 20.0, 4),
(402, 'Lote 402 de Termómetro Digital', 'Sin observaciones', '2024-08-01', '2025-08-01', 25, 500.0, 20.0, 4),
(403, 'Lote 403 de Termómetro Digital', 'Sin observaciones', '2024-08-01', '2025-08-01', 25, 500.0, 20.0, 4),
(404, 'Lote 404 de Termómetro Digital', 'Sin observaciones', '2024-08-01', '2025-08-01', 25, 500.0, 20.0, 4),
(501, 'Lote 501 de Crema Hidratante', 'Sin observaciones', '2024-08-01', '2025-08-01', 40, 200.0, 5.0, 5),
(502, 'Lote 502 de Crema Hidratante', 'Sin observaciones', '2024-08-01', '2025-08-01', 40, 200.0, 5.0, 5),
(503, 'Lote 503 de Crema Hidratante', 'Sin observaciones', '2024-08-01', '2025-08-01', 40, 200.0, 5.0, 5),
(601, 'Lote 601 de Antibiótico', 'Sin observaciones', '2024-08-01', '2025-08-01', 60, 300.0, 5.0, 6),
(602, 'Lote 602 de Antibiótico', 'Sin observaciones', '2024-08-01', '2025-08-01', 60, 300.0, 5.0, 6),
(603, 'Lote 603 de Antibiótico', 'Producto vencido', '2022-08-01', '2023-08-01', 60, 300.0, 5.0, 6),
(701, 'Lote 701 de Aspirina', 'Sin observaciones', '2024-08-01', '2025-08-01', 45, 225.0, 5.0, 7),
(702, 'Lote 702 de Aspirina', 'Sin observaciones', '2024-08-01', '2025-08-01', 45, 225.0, 5.0, 7),
(703, 'Lote 703 de Aspirina', 'Producto vencido', '2022-08-01', '2023-08-01', 45, 225.0, 5.0, 7),
(801, 'Lote 801 de Multivitamínico', 'Sin observaciones', '2024-08-01', '2025-08-01', 90, 270.0, 3.0, 8),
(802, 'Lote 802 de Multivitamínico', 'Sin observaciones', '2024-08-01', '2025-08-01', 90, 270.0, 3.0, 8),
(803, 'Lote 803 de Multivitamínico', 'Producto cercano a vencerse', '2023-08-01', '2024-08-01', 90, 270.0, 3.0, 8),
(804, 'Lote 804 de Multivitamínico', 'Producto vencido', '2022-08-01', '2023-08-01', 90, 270.0, 3.0, 8),
(901, 'Lote 901 de Guantes Quirúrgicos', 'Sin observaciones', '2024-08-01', '2025-08-01', 100, 400.0, 4.0, 9),
(902, 'Lote 902 de Guantes Quirúrgicos', 'Sin observaciones', '2024-08-01', '2025-08-01', 100, 400.0, 4.0, 9),
(903, 'Lote 903 de Guantes Quirúrgicos', 'Sin observaciones', '2024-08-01', '2025-08-01', 100, 400.0, 4.0, 9),
(1001, 'Lote 1001 de Jabón Antibacterial', 'Sin observaciones', '2024-08-01', '2025-08-01', 50, 150.0, 3.0, 10),
(1002, 'Lote 1002 de Jabón Antibacterial', 'Sin observaciones', '2024-08-01', '2025-08-01', 50, 150.0, 3.0, 10),
(1003, 'Lote 1003 de Jabón Antibacterial', 'Producto cercano a vencerse', '2023-08-01', '2024-08-01', 50, 150.0, 3.0, 10),
(1101, 'Lote 1101 de Omeprazol', 'Sin observaciones', '2024-08-01', '2025-08-01', 65, 325.0, 5.0, 11),
(1102, 'Lote 1102 de Omeprazol', 'Sin observaciones', '2024-08-01', '2025-08-01', 65, 325.0, 5.0, 11),
(1103, 'Lote 1103 de Omeprazol', 'Producto cercano a vencerse', '2023-08-01', '2024-08-01', 65, 325.0, 5.0, 11),
(1201, 'Lote 1201 de Amoxicilina', 'Sin observaciones', '2024-08-01', '2025-08-01', 55, 275.0, 5.0, 12),
(1202, 'Lote 1202 de Amoxicilina', 'Sin observaciones', '2024-08-01', '2025-08-01', 55, 275.0, 5.0, 12),
(1203, 'Lote 1203 de Amoxicilina', 'Producto vencido', '2022-08-01', '2023-08-01', 55, 275.0, 5.0, 12),
(1301, 'Lote 1301 de Gasa Estéril', 'Sin observaciones', '2024-08-01', '2025-08-01', 100, 300.0, 3.0, 13),
(1302, 'Lote 1302 de Gasa Estéril', 'Sin observaciones', '2024-08-01', '2025-08-01', 100, 300.0, 3.0, 13),
(1303, 'Lote 1303 de Gasa Estéril', 'Producto vencido', '2022-08-01', '2023-08-01', 100, 300.0, 3.0, 13),
(1401, 'Lote 1401 de Jarabe para la Tos', 'Sin observaciones', '2024-08-01', '2025-08-01', 75, 225.0, 3.0, 14),
(1402, 'Lote 1402 de Jarabe para la Tos', 'Producto cercano a vencerse', '2023-08-01', '2024-08-01', 75, 225.0, 3.0, 14),
(1403, 'Lote 1403 de Jarabe para la Tos', 'Producto vencido', '2022-08-01', '2023-08-01', 75, 225.0, 3.0, 14);
