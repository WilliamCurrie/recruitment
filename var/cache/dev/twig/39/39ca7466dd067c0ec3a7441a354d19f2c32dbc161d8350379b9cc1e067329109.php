<?php

/* @Framework/Form/form_widget.html.php */
class __TwigTemplate_3849f3f434d274058228eabe55ac89fa0c2c41cdcf3d5141d105e80d61ae1d9f extends Twig_Template
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
        $__internal_1209e4b79cee92b760753fdc4204e9c2032b296312139cb864bb1f6a70b553b3 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_1209e4b79cee92b760753fdc4204e9c2032b296312139cb864bb1f6a70b553b3->enter($__internal_1209e4b79cee92b760753fdc4204e9c2032b296312139cb864bb1f6a70b553b3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_widget.html.php"));

        $__internal_5ff14d14fb2a054524363397309ecc716536aec202d97d40dc41812542807b5f = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_5ff14d14fb2a054524363397309ecc716536aec202d97d40dc41812542807b5f->enter($__internal_5ff14d14fb2a054524363397309ecc716536aec202d97d40dc41812542807b5f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_widget.html.php"));

        // line 1
        echo "<?php if (\$compound): ?>
<?php echo \$view['form']->block(\$form, 'form_widget_compound')?>
<?php else: ?>
<?php echo \$view['form']->block(\$form, 'form_widget_simple')?>
<?php endif ?>
";
        
        $__internal_1209e4b79cee92b760753fdc4204e9c2032b296312139cb864bb1f6a70b553b3->leave($__internal_1209e4b79cee92b760753fdc4204e9c2032b296312139cb864bb1f6a70b553b3_prof);

        
        $__internal_5ff14d14fb2a054524363397309ecc716536aec202d97d40dc41812542807b5f->leave($__internal_5ff14d14fb2a054524363397309ecc716536aec202d97d40dc41812542807b5f_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_widget.html.php";
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
        return new Twig_Source("<?php if (\$compound): ?>
<?php echo \$view['form']->block(\$form, 'form_widget_compound')?>
<?php else: ?>
<?php echo \$view['form']->block(\$form, 'form_widget_simple')?>
<?php endif ?>
", "@Framework/Form/form_widget.html.php", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/form_widget.html.php");
    }
}
