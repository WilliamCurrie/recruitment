<?php

/* @Framework/Form/collection_widget.html.php */
class __TwigTemplate_7c0eb4a933adb72ad8c55e92047cc9a227a3d982099fb8a08783c3f19e14eba6 extends Twig_Template
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
        $__internal_3f2ec869fd856d35d4ad87f157a1e858d1b80688cfecde3430e565c16ca368b5 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_3f2ec869fd856d35d4ad87f157a1e858d1b80688cfecde3430e565c16ca368b5->enter($__internal_3f2ec869fd856d35d4ad87f157a1e858d1b80688cfecde3430e565c16ca368b5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/collection_widget.html.php"));

        $__internal_8d8cc68eff4da7617ff3385c72be527876a74218b6814ff12b2a852a255bfb79 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_8d8cc68eff4da7617ff3385c72be527876a74218b6814ff12b2a852a255bfb79->enter($__internal_8d8cc68eff4da7617ff3385c72be527876a74218b6814ff12b2a852a255bfb79_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/collection_widget.html.php"));

        // line 1
        echo "<?php if (isset(\$prototype)): ?>
    <?php \$attr['data-prototype'] = \$view->escape(\$view['form']->row(\$prototype)) ?>
<?php endif ?>
<?php echo \$view['form']->widget(\$form, array('attr' => \$attr)) ?>
";
        
        $__internal_3f2ec869fd856d35d4ad87f157a1e858d1b80688cfecde3430e565c16ca368b5->leave($__internal_3f2ec869fd856d35d4ad87f157a1e858d1b80688cfecde3430e565c16ca368b5_prof);

        
        $__internal_8d8cc68eff4da7617ff3385c72be527876a74218b6814ff12b2a852a255bfb79->leave($__internal_8d8cc68eff4da7617ff3385c72be527876a74218b6814ff12b2a852a255bfb79_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/collection_widget.html.php";
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
        return new Twig_Source("<?php if (isset(\$prototype)): ?>
    <?php \$attr['data-prototype'] = \$view->escape(\$view['form']->row(\$prototype)) ?>
<?php endif ?>
<?php echo \$view['form']->widget(\$form, array('attr' => \$attr)) ?>
", "@Framework/Form/collection_widget.html.php", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/collection_widget.html.php");
    }
}
