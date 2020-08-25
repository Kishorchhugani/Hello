<?php
namespace Meetanshi\Hello\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\App\ObjectManager;
class InstallSchema implements InstallSchemaInterface
{

    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        try {
            $installer = $setup;
            $installer->startSetup();
            if (!$installer->tableExists('mt_registration')) {
                $table = $installer->getConnection()->newTable(
                    $installer->getTable('mt_registration')
                )
                    ->addColumn(
                        'id',
                        Table::TYPE_INTEGER,
                        null,
                        [
                            'identity' => true,
                            'nullable' => false,
                            'primary' => true,
                            'unsigned' => true,
                        ],
                        'id'
                    )
                    ->addColumn(
                        'name',
                        Table::TYPE_TEXT,
                        255,
                        ['nullable => false'],
                        'Name'
                    )
                    ->addColumn(
                        'email',
                        Table::TYPE_TEXT,
                        40,
                        [],
                        'Email'
                    )
                    ->addColumn(
                        'gender',
                        Table::TYPE_TEXT,
                        '12',
                        [],
                        'Gender'
                    )
                    ->addColumn(
                        'dob',
                        Table::TYPE_DATE,
                        '12',
                        [],
                        'Date Of Birth'
                    )
                    ->setComment('Post Table');
                $installer->getConnection()->createTable($table);

            }
            $installer->endSetup();


        }
        catch(\Exception $ex)
        {
            ObjectManager::getInstance()->get('Psr\Log\LoggerInterface')->info($ex->getMessage());
        }
    }
}