<?php
namespace VisioCrudModeler\Descriptor\Db;


use VisioCrudModeler\Descriptor\ReferenceFieldInterface;
use VisioCrudModeler\Descriptor\AbstractFiledDescriptor;

/**
 * DataSet Field descriptor
 *
 * @author bweres01
 *        
 */
class DbFieldDescriptor extends AbstractFiledDescriptor implements ReferenceFieldInterface
{

    /**
     * returns referenced field descriptor
     *
     * @return \VisioCrudModeler\Descriptor\Db\DbFieldDescriptor
     */
    public function getReferencedField()
    {
        if ($this->isReference()) {
            if ($this->referencedDataSetName() == $this->getDataSetDescriptor()->getName()) {
                return $this->getDataSetDescriptor()->getFieldDescriptor($this->referencedFieldName());
            } else {
                return $this->getDataSetDescriptor()
                    ->getDataSourceDescriptor()
                    ->getDataSetDescriptor($this->referencedDataSetName())
                    ->getFieldDescriptor($this->referencedFieldName());
            }
        }
    }
    
    /*
     * (non-PHPdoc) @see \VisioCrudModeler\Descriptor\FieldDescriptorInterface::isReference()
     */
    public function isReference()
    {
        return ($this->definition['reference'] !== false);
    }
    
    /*
     * (non-PHPdoc) @see \VisioCrudModeler\Descriptor\ReferenceFieldInterface::referencedDataSetName()
     */
    public function referencedDataSetName()
    {
        return $this->definition['reference']['dataset'];
    }
    
    /*
     * (non-PHPdoc) @see \VisioCrudModeler\Descriptor\ReferenceFieldInterface::referencedFieldName()
     */
    public function referencedFieldName()
    {
        return $this->definition['reference']['field'];
    }

   
}