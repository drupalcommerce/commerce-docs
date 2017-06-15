Creating a checkout pane plugin
===============================

There the default, and most commonly used, checkout flow uses checkout panes to build the checkout. Checkout panes are provided through the :code:`CheckoutPane` plugin.

This documentation will show you how to create a custom checkout pane plugin. For our example, we will add `Google's reCaptcha <https://www.google.com/recaptcha/intro/android.html>`_.

First you will need a custom module. If you are using `Drupal Console <https://drupalconsole.com/>`_, then you can execute this command from your Drupal directory using the :code:`generate:module` command.

.. code-block:: bash

    drupal generate:module  \ 
        --module="Checkout reCaptcha" \
        --machine-name="commerce_checkout_recaptcha" \ 
        --module-path="/modules/custom" \
        --description="Provides reCaptcha for checkout" \
        --core="8.x" \ 
        --package="Custom" \
        --composer \
        --dependencies="commerce:commerce_checkout"

Now, we will use the :code:`generate:plugin:skeleton` command to create a bare bones :code:`CheckoutPane` plugin.

.. code-block:: bash

    drupal generate:plugin:skeleton \
        --module="commerce_checkout_recaptcha" \
        --plugin-id="commerce_checkout_pane" \
        --class="CheckoutReCaptcha"

A new file :code:`CheckoutReCaptcha.php` will be created inside
the :code:`src/Plugin/Commerce/CheckoutPane` directory within your module.

Modify the class so it resembles the sample code below

.. code-block:: php

    <?php

    namespace Drupal\my_checkout_pane\Plugin\Commerce\CheckoutPane;

    use Drupal\commerce_checkout\Plugin\Commerce\CheckoutPane\CheckoutPaneInterface;
    use Drupal\commerce_checkout\Plugin\Commerce\CheckoutPane\CheckoutPaneBase;
    use Drupal\Core\Form\FormStateInterface;

    /**
     * @CommerceCheckoutPane(
     *  id = "commerce_checkout_recaptcha",
     *  label = @Translation("reCaptcha"),
     *  admin_label = @Translation("reCaptcha"),
     * )
     */
    class CheckoutReCaptcha extends CheckoutPaneBase implements CheckoutPaneInterface {

      /**
       * {@inheritdoc}
       */
      public function buildPaneForm(array $pane_form, FormStateInterface $form_state, array &$complete_form) {
        $pane_form['recaptcha'] = [
          '#type' => 'inline_template',
          '#template' => '<div class="g-recaptcha clearfix" style="clear: both;" data-sitekey="{{ google_recaptcha_public_key }}"></div>',
          '#context' => [
          'google_recaptcha_public_key' => 'ENTER_KEY_HERE',
        ],
          '#weight' => 100,
        ];
        return $pane_form;
      }

      /**
       * {@inheritdoc}
       */
      public function validatePaneForm(array $pane_form, FormStateInterface $form_state, array &$complete_form) {
        try {
            $result = \Drupal::httpClient()->post('https://www.google.com/recaptcha/api/siteverify', [
              'form_params' => [
                'secret' => 'ENTER_KEY_HERE',
                'response' => $_POST['g-recaptcha-response'],
                'remoteip' => \Drupal::request()->getClientIp(),
              ],
            ]);
            $result = Json::decode($result->getBody()->getContents());
            if (!$result['success']) {
              $form_state->setErrorByName('recaptcha', $this->t('Error validating you are not a robot.'));
            }
        }
        catch (\Exception $e) {
            $form_state->setErrorByName('recaptcha', $this->t('Error validating you are not a robot.'));
        }
      }

    }

Enable the module :code:`commerce_checkout_recaptcha`.

.. code-block:: bash

    drupal module:install commerce_checkout_recaptcha

Now, when users enter checkout, they will have to pass the reCaptcha in order to move forward.

.. figure:: images/custom_checkout_pane_3.png
   :alt: Custom checkout pane 3
