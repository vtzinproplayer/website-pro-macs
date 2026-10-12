-- Demo data — Elite Digital Clone

-- Recondicionados (6 exemplos)
INSERT INTO `ps_reconditioned_product` (id_product, grade, warranty_months, battery_health, battery_cycles, cosmetic_notes, previous_use, co2_saved_kg, includes_charger, stock_serial) VALUES
(9001, 'A+', 24, 97, 42, 'Sem marcas visíveis — como novo', 'Empresarial', 312.50, 1, 'SN-RC-9001-INSYS'),
(9002, 'A', 24, 89, 128, 'Micro-riscos na tampa', 'Empresarial', 285.00, 1, 'SN-RC-9002-DELL'),
(9003, 'A', 24, 92, 95, 'Impecável', 'Escola Digital', 295.00, 1, 'SN-RC-9003-LENOVO'),
(9004, 'B', 12, 78, 342, 'Desgaste leve no teclado', 'Empresarial', 260.00, 1, 'SN-RC-9004-HP'),
(9005, 'A+', 24, 95, 67, 'Como novo — selo Inforlândia', 'Exposição', 300.00, 1, 'SN-RC-9005-ASUS'),
(9006, 'A', 24, 90, 110, 'Ligeira marca na base', 'Empresarial', 275.00, 1, 'SN-RC-9006-ACER');

-- Componentes para Configurador (demo realista PT preços)
INSERT INTO `ps_pc_component` (category, brand, name, sku, price, price_old, socket, ram_type, form_factor, watt_tdp, length_mm, specs, image) VALUES
-- CPUs
('cpu','Intel','Core i5-13400F 10-Core 4.6GHz','CPU-I5-13400F',189.90,219.90,'LGA1700',NULL,NULL,65,NULL,'{"cores":10,"threads":16,"boost":"4.6GHz"}','cpu-i5.png'),
('cpu','Intel','Core i7-14700F 20-Core 5.4GHz','CPU-I7-14700F',389.90,429.90,'LGA1700',NULL,NULL,65,NULL,'{"cores":20,"threads":28,"boost":"5.4GHz"}','cpu-i7.png'),
('cpu','AMD','Ryzen 5 7600 6-Core 5.1GHz','CPU-R5-7600',229.90,NULL,'AM5',NULL,NULL,65,NULL,'{"cores":6,"threads":12,"boost":"5.1GHz"}','cpu-r5.png'),
('cpu','AMD','Ryzen 7 7800X3D 8-Core','CPU-R7-7800X3D',449.00,489.00,'AM5',NULL,NULL,120,NULL,'{"cores":8,"threads":16,"boost":"5.0GHz"}','cpu-r7.png'),
-- Motherboards
('motherboard','ASUS','PRIME B760M-A WIFI DDR4','MB-B760M-ASUS',139.90,NULL,'LGA1700','DDR4','mATX',0,NULL,'{"chipset":"B760","slots_m2":2,"wifi":true}','mb-b760.png'),
('motherboard','MSI','B650 GAMING PLUS WIFI DDR5','MB-B650-MSI',179.90,199.90,'AM5','DDR5','ATX',0,NULL,'{"chipset":"B650","slots_m2":3,"wifi":true}','mb-b650.png'),
('motherboard','Gigabyte','Z790 AORUS ELITE DDR5','MB-Z790-AORUS',269.90,NULL,'LGA1700','DDR5','ATX',0,NULL,'{"chipset":"Z790","slots_m2":4,"wifi":true}','mb-z790.png'),
-- RAM
('ram','Corsair','Vengeance LPX 16GB (2x8) DDR4 3200MHz','RAM-16-DDR4-COR',49.90,59.90,NULL,'DDR4',NULL,0,NULL,'{"capacity":"16GB","speed":"3200MHz","latency":"CL16"}','ram-ddr4.png'),
('ram','Kingston','FURY Beast 32GB (2x16) DDR5 5600MHz','RAM-32-DDR5-KIN',119.90,NULL,NULL,'DDR5',NULL,0,NULL,'{"capacity":"32GB","speed":"5600MHz","latency":"CL36"}','ram-ddr5.png'),
('ram','G.Skill','Trident Z5 32GB DDR5 6000MHz','RAM-32-DDR5-GSK',139.90,NULL,NULL,'DDR5',NULL,0,NULL,'{"capacity":"32GB","speed":"6000MHz","latency":"CL30"}','ram-trident.png'),
-- GPUs
('gpu','ASUS','GeForce RTX 4060 8GB Dual OC','GPU-RTX4060-ASUS',329.90,359.90,NULL,NULL,NULL,115,227,'{"vram":"8GB GDDR6","ports":"HDMI+3xDP"}','gpu-4060.png'),
('gpu','MSI','GeForce RTX 4070 SUPER 12GB','GPU-RTX4070S-MSI',629.90,NULL,NULL,NULL,NULL,220,307,'{"vram":"12GB GDDR6X","ports":"HDMI+3xDP"}','gpu-4070.png'),
('gpu','Sapphire','Radeon RX 7600 8GB Pulse','GPU-RX7600-SAP',269.90,NULL,NULL,NULL,NULL,165,240,'{"vram":"8GB GDDR6","ports":"HDMI+3xDP"}','gpu-7600.png'),
('gpu','Zotac','GeForce RTX 5070 Ti 16GB SOLID','GPU-RTX5070T-ZOT',899.90,NULL,NULL,NULL,NULL,300,320,'{"vram":"16GB GDDR7","ports":"HDMI+3xDP"}','gpu-5070.png'),
-- Storage
('storage','Samsung','980 PRO 1TB NVMe M.2','SSD-1TB-980PRO',89.90,109.90,NULL,NULL,NULL,0,NULL,'{"type":"NVMe PCIe 4.0","read":"7000MB/s"}','ssd-980.png'),
('storage','WD','Black SN770 2TB NVMe','SSD-2TB-SN770',129.90,NULL,NULL,NULL,0,NULL,'{"type":"NVMe PCIe 4.0","read":"5150MB/s"}','ssd-wd.png'),
('storage','Seagate','Barracuda 2TB HDD 7200rpm','HDD-2TB-SEA',59.90,NULL,NULL,NULL,0,NULL,'{"type":"SATA HDD","rpm":7200}','hdd-sea.png'),
-- Cases
('case','MSI','MAG FORGE M100A mATX Vidro','CASE-M100A-MSI',49.90,NULL,NULL,NULL,'mATX',0,300,'{"fans_included":4,"max_gpu":300}','case-msi.png'),
('case','NZXT','H5 Flow ATX Mid Tower','CASE-H5-NZXT',99.90,NULL,NULL,NULL,'ATX',0,365,'{"fans_included":2,"max_gpu":365}','case-nzxt.png'),
('case','Corsair','4000D Airflow ATX','CASE-4000D-COR',94.90,NULL,NULL,NULL,'ATX',0,360,'{"fans_included":2,"max_gpu":360}','case-corsair.png'),
-- PSUs
('psu','Corsair','CV550 550W 80+ Bronze','PSU-550-COR',54.90,NULL,NULL,NULL,NULL,550,NULL,'{"efficiency":"80+ Bronze","modular":false}','psu-550.png'),
('psu','Seasonic','Focus GX 650W 80+ Gold Modular','PSU-650-SEA',89.90,NULL,NULL,NULL,NULL,650,NULL,'{"efficiency":"80+ Gold","modular":true}','psu-650.png'),
('psu','Be Quiet!','Straight Power 850W 80+ Gold','PSU-850-BQ',129.90,NULL,NULL,NULL,NULL,850,NULL,'{"efficiency":"80+ Gold","modular":true}','psu-850.png'),
-- Coolers
('cooler','Cooler Master','Hyper 212 Black Edition','COOL-212-CM',39.90,NULL,NULL,NULL,NULL,0,159,'{"type":"Air","height":159}','cooler-212.png'),
('cooler','Arctic','Liquid Freezer II 240 AIO','COOL-240-ARC',89.90,NULL,NULL,NULL,NULL,0,NULL,'{"type":"AIO 240mm","height":0}','cooler-arctic.png');
