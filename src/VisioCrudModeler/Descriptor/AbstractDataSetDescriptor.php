<?php
namespace VisioCrudModeler\Descriptor;

/**
 * abstract class for DataSet Descriptor
 *
 * @author bweres01
 *        
 */
abstract class AbstractDataSetDescriptor implements DataSetDescriptorInterface
{

    protected $definition = array();

    /**
     * holds DataSource descriptor
     *
     * @var DataSourceDescriptorInterface
     */
    protected $dataSourceDescriptor = null;
    
    /**
     * constructor, accepts datasource and dataset definition
     *
     * @param \VisioCrudModeler\Descriptor\AbstractDataSourceDescriptor $descriptor            
     * @param array $definition            
     */
    public function __construct(AbstractDataSourceDescriptor $descriptor, array $definition)
    {
        $this->setDataSourceDescriptor($descriptor);
        $this->definition = $definition;
        $this->fieldDescriptors = new \ArrayObject(array());
    }
    
    /**
     * sets DataSource descriptor
     *
     * @param DataSourceDescriptorInterface $descriptor            
     * @return AbstractDataSetDescriptor
     */
    public function setDataSourceDescriptor($descriptor)
    {
        $this->dataSourceDescriptor = $descriptor;
        return $this;
    }

    /**
     * gets DataSource descriptor
     *
     * @return DataSourceDescriptorInterface
     */
    public function getDataSourceDescriptor()
    {
        return $this->dataSourceDescriptor;
    }
    /*
     * (non-PHPdoc) @see \VisioCrudModeler\DataSetDescriptorInterface::getName()
     */
    abstract public function getName();

    /**
     * (non-PHPdoc)
     *
     * @see \VisioCrudModeler\Descriptor\DataSetDescriptorInterface::getType()
     */
    abstract public function getType();
    
    /*
     * (non-PHPdoc) @see \VisioCrudModeler\Descriptor\DataSetDescriptorInterface::listFields()
     */
    abstract public function listFields();
    
    /*
     * (non-PHPdoc) @see \VisioCrudModeler\Descriptor\DataSetDescriptorInterface::getFieldDescriptor()
     */
    abstract public function getFieldDescriptor($fieldName);
}