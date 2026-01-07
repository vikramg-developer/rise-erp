<?php
use CodeIgniter\Database\ConnectionInterface;
/*-------------- Add foreign key  ---------------------*/
function add_fk(
    ConnectionInterface  $db,
    string $table,
    string $column,
    string $refTable,
    string $refColumn = 'id',
    string $onDelete = 'RESTRICT',
    string $onUpdate = 'CASCADE'
) {
    $fkName = "fk_{$table}_{$column}";

    $sql = "
        ALTER TABLE `$table`
        ADD CONSTRAINT `$fkName`
        FOREIGN KEY (`$column`)
        REFERENCES `$refTable`(`$refColumn`)
        ON DELETE $onDelete
        ON UPDATE $onUpdate
    ";

    $db->query($sql);
}

/*-------------- Drop foreign key  ---------------------*/
function drop_fk(ConnectionInterface  $db, string $table, string $column) {
    $fkName = "fk_{$table}_{$column}";
    $db->query("ALTER TABLE `$table` DROP FOREIGN KEY `$fkName`");
}