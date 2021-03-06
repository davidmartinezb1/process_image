<?php 

namespace Drupal\ngt_process_images\Plugin\Block;

use Drupal\Component\Transliteration\TransliterationInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\ngt_process_images\Plugin\Config\Block\UploadImagesBlockClass;
use Drupal\ngt_general\CardBlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Provides a 'UploadImagesBlock' block.
 *
 * @Block(
 *  id = "ngt_process_images_upload_image",
 *  admin_label = @Translation("NGT carga de imágenes"),
 * )
 */
class UploadImagesBlock extends CardBlockBase implements ContainerFactoryPluginInterface{
    /**
     * @var \Drupal\ngt_process_images\Plugin\Config\Block\UploadImagesBlockClass
     */
    protected $configurationInstance;

    /**
     * @param array $configuration
     * @param string $plugin_id
     * @param mixed $plugin_definition
     * @param \Drupal\ngt_process_images\Plugin\Config\Block\UploadImagesBlockClass $configurationInstance
     */
    public function __construct(array $configuration, $plugin_id, $plugin_definition, UploadImagesBlockClass $configurationInstance) {
        // Store our dependency.
        $this->configurationInstance = $configurationInstance;

        // Call parent construct method.
        parent::__construct($configuration, $plugin_id, $plugin_definition);

        // Set init config.
        $this->configurationInstance->setConfig($this, $this->configuration);
    }

    /**
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
     * @param array $configuration
     * @param string $plugin_id
     * @param mixed $plugin_definition
     * @return static
     */
    public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
        return new static(
            $configuration,
            $plugin_id,
            $plugin_definition,
            $container->get('ngt_process_images.upload_image')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function defaultConfiguration() {
        if (method_exists($this->configurationInstance, 'defaultConfiguration')) {
            return $this->configurationInstance->defaultConfiguration();
        }
        return parent::defaultConfiguration();
    }

    /**
     * {@inheritdoc}
     */
    public function blockAccess(AccountInterface $account) {
        if (method_exists($this->configurationInstance, 'blockAccess')) {
            return $this->configurationInstance->blockAccess($account);
        }
        return parent::blockAccess($account);
    }

    /**
     * {@inheritdoc}
     */
    public function blockForm($form, FormStateInterface $form_state) {
        if (method_exists($this->configurationInstance, 'blockForm')) {
            return $this->configurationInstance->blockForm($form, $form_state, $this->configuration);
        }
        return parent::blockForm($form, $form_state);
    }

    /**
     * {@inheritdoc}
     */
    public function blockSubmit($form, FormStateInterface $form_state) {
        if (method_exists($this->configurationInstance, 'blockSubmit')) {
            $this->configurationInstance->blockSubmit($form, $form_state, $this->configuration);
        }
        // TODO: Change the autogenerated stub.
        parent::blockSubmit($form, $form_state);
    }

    /**
     * {@inheritdoc}
     */
    public function blockValidate($form, FormStateInterface $form_state) {
        if (method_exists($this->configurationInstance, 'blockValidate')) {
            return $this->configurationInstance->blockValidate($form, $form_state);
        }
        // TODO: Change the autogenerated stub.
        parent::blockValidate($form, $form_state);
    }

    /**
     * {@inheritdoc}
     */
    public function build() {
        if (method_exists($this->configurationInstance, 'build')) {
            return $this->configurationInstance->build($this, $this->configuration);
        }
        return parent::build();
    }

    /**
     * {@inheritdoc}
     */
    public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
        if (method_exists($this->configurationInstance, 'buildConfigurationForm')) {
            return $this->configurationInstance->buildConfigurationForm($form, $form_state);
        }
        // TODO: Change the autogenerated stub.
        return parent::buildConfigurationForm($form, $form_state);
    }

    /**
     * {@inheritdoc}
     */
    public function getMachineNameSuggestion() {
        if (method_exists($this->configurationInstance, 'getMachineNameSuggestion')) {
            return $this->configurationInstance->getMachineNameSuggestion();
        }
        // TODO: Change the autogenerated stub.
        return parent::getMachineNameSuggestion();
    }

    /**
     * {@inheritdoc}
     */
    public function getCacheMaxAge() {
        if (method_exists($this->configurationInstance, 'getCacheMaxAge')) {
            return $this->configurationInstance->getCacheMaxAge();
        }
        return parent::getCacheMaxAge();
    }

    /**
     * {@inheritdoc}
     */
    public function setTransliteration(TransliterationInterface $transliteration) {
        if (method_exists($this->configurationInstance, 'setTransliteration')) {
            return $this->configurationInstance->setTransliteration($transliteration);
        }
        // TODO: Change the autogenerated stub.
        parent::setTransliteration($transliteration);
    }

    /**
     * {@inheritdoc}
     */
    public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
        if (method_exists($this->configurationInstance, 'submitConfigurationForm')) {
            return $this->configurationInstance->submitConfigurationForm($form, $form_state);
        }
        // TODO: Change the autogenerated stub.
        parent::submitConfigurationForm($form, $form_state);
    }

    /**
     * {@inheritdoc}
     */
    public function validateConfigurationForm(array &$form, FormStateInterface $form_state) {
        if (method_exists($this->configurationInstance, 'validateConfigurationForm')) {
            return $this->configurationInstance->validateConfigurationForm($form, $form_state);
        }
        // TODO: Change the autogenerated stub.
        parent::validateConfigurationForm($form, $form_state);
    }

}