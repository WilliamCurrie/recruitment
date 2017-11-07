<?php

/* @Framework/Form/submit_widget.html.php */
class __TwigTemplate_1f88676d193f7cd0bb0252a415adaf322d95fd2c26e299992907078cd098ab14 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_80c6726878cc715ba846ba8229e27274ce72445f24a6bfa1329f74d8be2b31fb = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_80c6726878cc715ba846ba8229e27274ce72445f24a6bfa1329f74d8be2b31fb->enter($__internal_80c6726878cc715ba846ba8229e27274ce72445f24a6bfa1329f74d8be2b31fb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/submit_widget.html.php"));

        $__internal_b972b0110a70e86b78f4d639ac64055f6d0bfbaff335decf23d9021a6bd99e55 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_b972b0110a70e86b78f4d639ac64055f6d0bfbaff335decf23d9021a6bd99e55->enter($__internal_b972b0110a70e86b78f4d639ac64055f6d0bfbaff335decf23d9021a6bd99e55_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/submit_widget.html.php"));

        // line 1
        echo "<?php echo \$view['form']->block(\$form, 'button_widget', array('type' => isset(\$type) ? \$type : 'submit')) ?>
";
        
        $__internal_80c6726878cc715ba846ba8229e27274ce72445f24a6bfa1329f74d8be2b31fb->leave($__internal_80c6726878cc715ba846ba8229e27274ce72445f24a6bfa1329f74d8be2b31fb_prof);

        
        $__internal_b972b0110a70e86b78f4d639ac64055f6d0bfbaff335decf23d9021a6bd99e55->leave($__internal_b972b0110a70e86b78f4d639ac64055f6d0bfbaff335decf23d9021a6bd99e55_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/submit_widget.html.php";
    }

    public function getDebugInfo()
    {
        return array (  25 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<?php echo \$view['form']->block(\$form, 'button_widget', array('type' => isset(\$type) ? \$type : 'submit')) ?>
", "@Framework/Form/submit_widget.html.php", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/submit_widget.html.php");
    }
}
