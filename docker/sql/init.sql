SET NAMES utf8;

INSERT INTO `customer` (id, legacy_id, first_name, second_name, address) VALUES
  ('05885254-bc4f-438e-b5db-2e1ae7ada969', 1, 'Jim', 'Edwards', '23 Where I live, Liverpool, L1 3TF'),
  ('4f202d2c-88ff-44a3-8819-bdf2c0b8677a', 2, 'Dave', 'Maher', '24 My House, Manchester, M1 3TF'),
  ('01ce5b64-e183-4a78-a2e9-cebcb48deaba', 3, 'Susan', 'Lewis', '25 Skelmer Road, London, LN1 3TF'),
  ('55d13d3b-1db4-4044-9f75-f0aa22f0ffa1', 4, 'Lorraine', 'Taylor', '26 Palm Avenue, Newcastle, N1 3TF');

INSERT INTO `booking` (id, customer_id, reference, `date`) VALUES
  ('95438f02-7708-4811-abc8-94980d218f2f', '05885254-bc4f-438e-b5db-2e1ae7ada969', 'JE122', '2017-01-01'),
  ('c8485865-b111-4873-954d-b97d183dcc27', '05885254-bc4f-438e-b5db-2e1ae7ada969', 'JE125', '2017-03-02'),
  ('508cc0f0-3226-4cea-a972-0c66b79a80e7', '01ce5b64-e183-4a78-a2e9-cebcb48deaba', 'LT478', '2017-02-15'),
  ('4e13468e-b8e7-465b-91d8-bc0d4b3340af', '55d13d3b-1db4-4044-9f75-f0aa22f0ffa1', 'LT791', '2017-04-01');
