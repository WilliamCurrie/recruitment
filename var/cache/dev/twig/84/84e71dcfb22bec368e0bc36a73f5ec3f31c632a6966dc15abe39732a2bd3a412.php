<?php

/* @Framework/Form/choice_widget.html.php */
class __TwigTemplate_fd7f4d71f8ac3e4401fa9822dc17d36493a2828d39e6ba9af33aee32f6bd53c8 extends Twig_Template
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
        $__internal_16ba48c32b62f6c1fbc2658b3903be40680b6dc4e069de80bc05c39b242db6ed = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_16ba48c32b62f6c1fbc2658b3903be40680b6dc4e069de80bc05c39b242db6ed->enter($__internal_16ba48c32b62f6c1fbc2658b3903be40680b6dc4e069de80bc05c39b242db6ed_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/choice_widget.html.php"));

        $__internal_4a669cfb265ca617f1382a932bd8a2a8795b56ca959b13692b155d5ec7eadb98 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_4a669cfb265ca617f1382a932bd8a2a8795b56ca959b13692b155d5ec7eadb98->enter($__internal_4a669cfb265ca617f1382a932bd8a2a8795b56ca959b13692b155d5ec7eadb98_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/choice_widget.html.php"));

        // line 1
        echo "<?php if (\$expanded): ?>
<?php echo \$view['form']->block(\$form, 'choice_widget_expanded') ?>
<?php else: ?>
<?php echo \$view['form']->block(\$form, 'choice_widget_collapsed') ?>
<?php endif ?>
";
        
        $__internal_16ba48c32b62f6c1fbc2658b3903be40680b6dc4e069de80bc05c39b242db6ed->leave($__internal_16ba48c32b62f6c1fbc2658b3903be40680b6dc4e069de80bc05c39b242db6ed_prof);

        
        $__internal_4a669cfb265ca617f1382a932bd8a2a8795b56ca959b13692b155d5ec7eadb98->leave($__internal_4a669cfb265ca617f1382a932bd8a2a8795b56ca959b13692b155d5ec7eadb98_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/choice_widget.html.php";
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
        return new Twig_Source("<?php if (\$expanded): ?>
<?php echo \$view['form']->block(\$form, 'choice_widget_expanded') ?>
<?php else: ?>
<?php echo \$view['form']->block(\$form, 'choice_widget_collapsed') ?>
<?php endif ?>
", "@Framework/Form/choice_widget.html.php", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/choice_widget.html.php");
    }
}
