<?php

/* @Framework/Form/email_widget.html.php */
class __TwigTemplate_0e410e86d2c4b230deedbc2b3a2fa2c39320c62871f3607271754f8234fa2b11 extends Twig_Template
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
        $__internal_82fffcbacf7cc9d6c7b521e21ce12cc45ae53d3039f7b5a9262e9c195366f146 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_82fffcbacf7cc9d6c7b521e21ce12cc45ae53d3039f7b5a9262e9c195366f146->enter($__internal_82fffcbacf7cc9d6c7b521e21ce12cc45ae53d3039f7b5a9262e9c195366f146_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/email_widget.html.php"));

        $__internal_da1b33c2f4d7849245d2b348614cb89186411c44e24d726a0f9589ed7bb0fd2e = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_da1b33c2f4d7849245d2b348614cb89186411c44e24d726a0f9589ed7bb0fd2e->enter($__internal_da1b33c2f4d7849245d2b348614cb89186411c44e24d726a0f9589ed7bb0fd2e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/email_widget.html.php"));

        // line 1
        echo "<?php echo \$view['form']->block(\$form, 'form_widget_simple', array('type' => isset(\$type) ? \$type : 'email')) ?>
";
        
        $__internal_82fffcbacf7cc9d6c7b521e21ce12cc45ae53d3039f7b5a9262e9c195366f146->leave($__internal_82fffcbacf7cc9d6c7b521e21ce12cc45ae53d3039f7b5a9262e9c195366f146_prof);

        
        $__internal_da1b33c2f4d7849245d2b348614cb89186411c44e24d726a0f9589ed7bb0fd2e->leave($__internal_da1b33c2f4d7849245d2b348614cb89186411c44e24d726a0f9589ed7bb0fd2e_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/email_widget.html.php";
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
        return new Twig_Source("<?php echo \$view['form']->block(\$form, 'form_widget_simple', array('type' => isset(\$type) ? \$type : 'email')) ?>
", "@Framework/Form/email_widget.html.php", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/email_widget.html.php");
    }
}
